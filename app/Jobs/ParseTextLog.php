<?php

namespace App\Jobs;

use App\DialoguePerson;
use App\Upload;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use ErrorException;

class ParseTextLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


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
    public function handle()
    {
        // TODO: parsing files
        // The following code transforms WA texts to csv. use as little reference
        //$file = Storage::get($this->upload->filename);
        $file = Storage::disk('local')->path($this->upload->filename);

        // skip first row ?
        $skip = true;

        foreach (file($file) as $row)
        {
            // If the row begins with some other than a date-time like string, it is likely a continuation
            if ($skip)
            {
                continue;
            }
            Log::info($row);
            // Check if DialoguePerson exists with name
            // dialoguePerson service with this and create
            DialoguePerson::where('person_name', $row);


            // 12 - Name : text
        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(ErrorException $exception)
    {
        // Send user notification of failure, etc...
    }
}
