<?php

namespace App\Jobs;

use App\Services\TextMessageService;
use App\Upload;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Services\DialoguePersonService;
use DateTime;

class ParseTextLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    protected $upload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        DialoguePersonService $dialoguePerson,
        TextMessageService $textMessage
    )
    {
        Log::info('file');

        // TODO: parsing files
        // The following code transforms WA texts to csv. use as little reference
        $file = Storage::disk('local')->path($this->upload->filename);
        // skip first row ?
        $skip = true;
        foreach (file($file) as $row)
        {
            // If the row begins with some other than a date-time like string, it is likely a continuation
            // Skipping first row...
            // TODO: handle first row nicely
            if ($skip)
            {
                $skip = false;
                continue;
            }
            $limit1 = strpos($row,'-');
            $limit2 = strpos($row,':');
            // Either not found...
            // TODO: Handle rows that continue previous line!!
            if ( ! ($limit1 && $limit2) )
            {
               continue;
            }
            $time = substr($row,0,$limit1);
            // TODO: handle date all used formats
            $time = explode('klo', $time);
            $date = trim($time[0]);
            $hours = trim($time[1]);
            $time = $date . ' ' .  $hours;
            $time = DateTime::createFromFormat('d.m.Y H.i', $time);

            $name = substr($row, $limit1, $limit2-$limit1);
            // slice '- ' from the name
            $name = substr(trim($name), 1);
            // slice ': ' from message
            $message = substr($row, $limit2);
            $message = substr(trim($message), 1);


            $person = $dialoguePerson->findPerson(
                $this->upload->user_id,
                $name
            );
            if( ! $person)
            {
                $person = $dialoguePerson->create([
                    'user_id' => $this->upload->user_id,
                    'person_name' => $name
                ]);
            }
            $textMessage->create([
                'user_id' => $this->upload->user_id,
                'person_id' => $person->id,
                'person_name' => $person->person_name,
                'message' => $message,
                'message_sent' => $time,
                'date' => $date,
                'time' => $hours,
            ]);

        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
    }
}
