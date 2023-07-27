<?php

namespace Zerotoprod\AppLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zerotoprod\AppLog\Commands\AppLogCommand;

class AppLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('applog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_applog_table')
            ->hasCommand(AppLogCommand::class);
    }
}
