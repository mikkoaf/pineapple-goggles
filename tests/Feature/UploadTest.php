<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\User;

class UploadTest extends TestCase
{
    public function testUploadFailsToIncorrectMimeType(): void
    {
        Storage::fake('local');

        //Given we have an authenticated user
        $this->actingAs(factory(User::class)->create());

        $this->json('POST', '/api/upload', [
            'upload' => UploadedFile::fake()->image('upload.jpg'),
        ])->assertStatus(422);

    }

    public function testAssertFileIsSaved()
    {
        Storage::fake('local');

        //Given we have an authenticated user
        $this->actingAs(factory(User::class)->create());

        $this->json('POST', '/api/upload', [
            'upload' => UploadedFile::fake()->create('textfile.txt',10),
        ])->assertStatus(202);
        // Assert the file was stored...
        Storage::disk('local')->assertExists('textfile.txt');

        // Assert a file does not exist...
        Storage::disk('local')->assertMissing('missing.jpg');
        // Assert that the upload has been recorded
        $this->assertDatabaseHas('uploads', ['filename' => 'textfile.txt']);
    }

}
