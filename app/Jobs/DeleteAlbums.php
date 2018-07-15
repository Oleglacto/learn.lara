<?php

namespace App\Jobs;

use App\Models\Album;
use App\Services\StorageService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class DeleteAlbums implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Album
     */
    protected $album;

    /**
     * Create a new job instance.
     *
     * @param Album $album
     */
    public function __construct(Album $album)
    {
        //
        $this->album = $album;
    }

    /**
     * Execute the job.
     *
     * @param StorageService $service
     * @return void
     */
    public function handle(StorageService $service)
    {
        try {
            if ($service->delete([public_path() . '/' .$this->album->cover_image, public_path() . '/' . $this->album->cover_image_original])) {
                $this->album->delete();
                Log::info('Альбом "' . $this->album->name . '" удален');
            }
        } catch (\Exception $e) {

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
