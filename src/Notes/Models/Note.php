<?php

namespace Nesiasoft\Core\Notes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Notes\Traits\HasNote;

class Note extends Model
{
    use HasNote;

    protected $fillable = [
        'body',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or one note.
     * This function will get all of the owning noteable models.
     *
     * @return MorphTo
     */
    public function noteable()
    {
        return $this->morphTo();
    }
}
