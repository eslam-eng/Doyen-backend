<?php

namespace App\Vendor\Spatie\Media;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class TenantAwareUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        // Get the path relative to root
        $url = asset($this->getPathRelativeToRoot());

        // Add versioning if needed
        return $this->versionUrl($url);
    }
}
