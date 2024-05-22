<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class UserTableComponent extends Component
{
    public Collection $users;

    public string $className = 'user';

    public array $header = [];

    public array $defaultColumnsSelected = [
        'id', 'name', 'email', 'created_at'
    ];

    public string $prefixRoute = 'admins.managements.user';

    /**
     * Create a new component instance.
     */
    public function __construct($users = [])
    {
        if(empty($users))
        {
            $users = User::select(...$this->defaultColumnsSelected)->get();
        }

        $this->className = getBaseClassName(User::class);

        $this->users = is_object($users) ? $users : new Collection($users);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-table-component');
    }
}
