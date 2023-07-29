<?php

namespace Zerotoprod\AppLog\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Zerotoprod\AppLog\Models\AppLog;

class LogController extends Controller
{
    public const from = 'from';
    public const to = 'to';

    /**
     * @see ./resources/views/pages/logs/index.blade.php
     */
    public function __invoke(Request $request): View
    {
        $levels = AppLog::distinct()->pluck(AppLog::level)->map(fn($level) => $request->get($level->value))->filter();
        $from = $request->get(self::from);
        $to = $request->get(self::to);

        return view('applog::pages.logs.index', [
            'logs' => AppLog::when($levels->isNotEmpty(), static fn(Builder $query) => $query->whereIn(AppLog::level, $levels))
                ->when($request->get('search') !== null, fn(Builder $query) => $query->where(AppLog::message, 'like', "%{$request->get('search')}%"))
                ->when($from && !$to, fn(Builder $query) => $query->where(AppLog::created_at, '>=', $from))
                ->when(!$from && $to, fn(Builder $query) => $query->where(AppLog::created_at, '<=', $to))
                ->when($from && $to, fn(Builder $query) => $query->whereBetween(AppLog::created_at, [$from, $to]))
                ->orderByDesc(AppLog::created_at)->paginate(15)
        ]);
    }
}
