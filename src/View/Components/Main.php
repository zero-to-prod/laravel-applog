<?php

namespace Zerotoprod\AppLog\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{

    public function __construct(public string $title = 'AppLog', public ?string $style = null)
    {
    }

    public function render(): View|Closure|string
    {
        return view('applog::components.main');
    }
}
