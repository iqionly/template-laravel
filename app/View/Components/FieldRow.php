<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FieldRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $name,
        public string $type = 'text',
        public string $value = '',
        public string $placeholder = '',
        public string $required = '',
        public string $class = '',
        public string $id = '',
        public string $description = '',
    ) { }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.field-row');
    }
}
