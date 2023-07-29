<?php

namespace Zerotoprod\AppLog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Zerotoprod\AppLog\Models\AppLog;

class LogShowController extends Controller
{
    public const log = 'log';
    public const levels = 'levels';

    /**
     * @see ./resources/views/pages/logs/index.blade.php
     */
    public function __invoke(string $id, Request $request): View
    {
        return view('applog::pages.logs.[id].index', [
                self::log => AppLog::findOrFail($id),
            ]
        );
    }
}
