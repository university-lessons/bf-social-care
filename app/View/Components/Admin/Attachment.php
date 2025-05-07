<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Attachment extends Component
{
    public $attachment;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $attachment
    ) {
        $this->attachment = $attachment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.attachment');
    }
}
