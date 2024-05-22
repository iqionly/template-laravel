<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Owner extends MorphPivot
{
    // use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    // /**
    //  * Get the parent commentable model (post or video).
    //  */
    // public function ownerable(): MorphTo
    // {
    //     return $this->morphTo();
    // }
}
