<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubjectForm extends Component
{
    public string $action;
    public $subject;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $action,
        $subject = null
    ) {
        $this->action = $action;
        $this->subject = $subject;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.subject-form');
    }
}
