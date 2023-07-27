<?php

namespace Zerotoprod\AppLog\Commands;

use Illuminate\Console\Command;

class AppLogCommand extends Command
{
    public $signature = 'applog';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
