<?php

namespace Zerotoprod\AppLog\Tests;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;
use Zerotoprod\AppLog\AppLogger;
use Zerotoprod\AppLog\AppLogHandler;
use Zerotoprod\AppLog\AppLogServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn(string $modelName) => 'Zerotoprod\\AppLog\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [AppLogServiceProvider::class];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__ . '/../database/migrations/create_applog_table.php.stub';
        $migration->up();
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function defineEnvironment($app): void
    {
        tap($app->make('config'), function (Repository $config) {
            $config->set('logging.default', 'stack');
            $config->set('logging.channels.stack', [
                'driver' => 'stack',
                'channels' => ['single', 'app_log'],
                'ignore_exceptions' => false,
            ]);
            $config->set('logging.channels.app_log', [
                'driver' => 'custom',
                'handler' => AppLogHandler::class,
                'via' => AppLogger::class,
                'level' => 'debug',
            ]);
        });
    }
}
