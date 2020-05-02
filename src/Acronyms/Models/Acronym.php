<?php

namespace Nesiasoft\Core\Acronyms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Acronyms\Traits\HasAcronyms;

class Acronym extends Model
{
    use HasAcronyms;

    protected $fillable = [
        'name',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many acronyms.
     * This function will get all of the owning acronymable models.
     *
     * @return MorphTo
     */
    public function acronymable()
    {
        return $this->morphTo();
    }
}
