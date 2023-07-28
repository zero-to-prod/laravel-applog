<?php

namespace Zerotoprod\AppLog;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('applog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_applog_table')
            ->hasMigration('add_full_text_index_to_formatted_in_applog_table')
            ->hasRoute('web');

        if (is_callable([Log::class, 'shareContext'])) {
            Log::shareContext(['id' => (string) Str::uuid()]);
        }
    }
}
