<?php

namespace Zerotoprod\AppLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zerotoprod\AppLog\Commands\AppLogCommand;

class AppLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('applog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_applog_table')
            ->hasMigration('add_full_text_index_to_formatted_in_applog_table');
    }
}
