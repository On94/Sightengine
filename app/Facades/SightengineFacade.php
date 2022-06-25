<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static null|string checkImageSafe(string $imageAddress)
 * @method static null|string checkVideoSafe(string $videoAddress)
 */
class SightengineFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'sightengine';
    }
}
