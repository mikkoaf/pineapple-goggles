<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Generator as Faker;

class UploadTest extends TestCase
{
    public function testUpload()
    {
        Storage::fake('local');

        $response = $this->json('POST', '/upload', [
            'upload' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        // Assert the file was stored...
        Storage::disk('local')->assertExists('avatar.jpg');

        // Assert a file does not exist...
        Storage::disk('local')->assertMissing('missing.jpg');
    }
}
