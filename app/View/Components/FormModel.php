<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class FormModel extends Component
{
    public string $id;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $action,
        public string $header,
        public string $method = 'POST',
        public string $description = '',
        public bool $hideSubmit = true
    ) { 
        $this->id = 'form-model-' . md5($action . $header);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-model');
    }
}
