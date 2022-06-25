<?php

namespace App\Services;

use Sightengine\SightengineClient;

class Sightengine
{

    const SAFE_MIN = 0.50;

    const SAFE = 'Safe';

    const NOT_SAFE = 'Not safe';

    /**
     * @var SightengineClient
     */
    private SightengineClient $client;

    /**
     * @param SightengineClient $client
     */
    public function __construct(SightengineClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $imageAddress
     * @return string|null
     */
    public function checkImageSafe(string $imageAddress): ?string
    {
        try {
            $data = $this->client->check(['nudity'])->set_url($imageAddress);
            if ($data->nudity->safe >= self::SAFE_MIN) {
                return self::SAFE;
            }
        } catch (\Exception $exception) {
            return null;
        }
        return self::NOT_SAFE;
    }

    /**
     * @param string $videoAddress
     * @return string|null
     */
    public function checkVideoSafe(string $videoAddress): ?string
    {
        try {
            $videoData = $this->client->check(['nudity'])->video_sync($videoAddress);
            foreach ($videoData->data->frames as $frame) {
                if ($frame->nudity->safe < self::SAFE_MIN) {
                    return self::NOT_SAFE;
                }
            }
        } catch (\Exception $exception) {
            return null;
        }
        return self::SAFE;
    }
}
