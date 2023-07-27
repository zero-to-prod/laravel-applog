<?php

namespace Zerotoprod\AppLog;

use Illuminate\Support\Facades\Auth;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Zerotoprod\AppLog\Models\AppLog;

class AppLogHandler extends AbstractProcessingHandler
{
    /**
     * @see DbLoggingTest
     */
    protected function write(LogRecord $record): void
    {
        $data = [
            AppLog::auth_id => Auth::user()?->id,
            AppLog::message => $record->message,
            AppLog::context_id => $record->context['id'] ?? null,
            AppLog::context => json_encode($record->context),
            AppLog::level => $record->level->value,
            AppLog::level_name => $record->level->getName(),
            AppLog::channel => $record->channel,
            AppLog::record_datetime => $record->datetime->format('Y-m-d H:i:s'),
            AppLog::extra => json_encode($record->extra),
            AppLog::formatted => $record->formatted,
            AppLog::remote_address => $_SERVER['REMOTE_ADDR'] ?? null,
            AppLog::user_agent => $_SERVER['HTTP_USER_AGENT'] ?? null,
            AppLog::created_at => date('Y-m-d H:i:s'),
        ];

        (new AppLog($data))->save();
    }
}
