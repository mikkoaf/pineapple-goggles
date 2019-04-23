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
use Carbon\Carbon;

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
        //$file = Storage::get($this->upload->filename);
        $file = Storage::disk('local')->path($this->upload->filename);
        // skip first row ?
        $skip = true;
        foreach (file($file) as $row)
        {
            // TODO: Handle rows that continue previous line!!
            // If the row begins with some other than a date-time like string, it is likely a continuation
            if ($skip)
            {
                $skip = false;
                continue;
            }
            $limit1 = strpos($row,'-');
            $limit2 = strpos($row,':');
            $time = substr($row,0,$limit1);
            // TODO: handle date formats
            // $time = DateTime::createFromFormat("d.m.Y \k\l\o HH.II", $time);

            $time = Carbon::now();
            $name = substr($row, $limit1, $limit2-$limit1);
            $message = substr($row, $limit2);
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
