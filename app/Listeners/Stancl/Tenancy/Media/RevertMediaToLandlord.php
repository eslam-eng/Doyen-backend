<?php

namespace App\Listeners\Stancl\Tenancy\Media;

use App\Models\Landlord\Media;
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;
use Stancl\Tenancy\Events\TenancyEnded;

class RevertMediaToLandlord
{

    /**
     * Handle the event.
     */
    public function handle(TenancyEnded $event): void
    {
        config([
            'media-library.media_model' => Media::class,
            'media-library.url_generator' => DefaultUrlGenerator::class,
        ]);
    }
}
