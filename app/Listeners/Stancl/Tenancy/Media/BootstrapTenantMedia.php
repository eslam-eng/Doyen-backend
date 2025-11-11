<?php

namespace App\Listeners\Stancl\Tenancy\Media;

use App\Models\Tenant\Media;
use App\Vendor\Spatie\Media\TenantAwareUrlGenerator;
use Stancl\Tenancy\Events\TenancyBootstrapped;

class BootstrapTenantMedia
{

    /**
     * Handle the event.
     */
    public function handle(TenancyBootstrapped $event): void
    {
        config([
            'media-library.media_model' => Media::class,
            'media-library.url_generator' => TenantAwareUrlGenerator::class,
        ]);
    }
}
