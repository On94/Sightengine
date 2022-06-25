<?php

namespace App\Http\Controllers;

use App\Facades\SightengineFacade;
use App\Http\Requests\CheckSafeRequest;


class SafeController extends Controller
{
    /**
     * @param CheckSafeRequest $request
     * @return string|null
     */
    public function checkImageSafe(CheckSafeRequest $request): ?string
    {
        return SightengineFacade::checkImageSafe($request->url_address);
    }

    /**
     * @param CheckSafeRequest $request
     * @return string|null
     */
    public function checkVideoSafe(CheckSafeRequest $request): ?string
    {
        return SightengineFacade::checkVideoSafe($request->url_address);
    }

}
