<?php

namespace Nesiasoft\Core\Phones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Phones\Traits\HasPhones;

class Phone extends Model
{
    use HasPhones;

    protected $fillable = [
        'address',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many phones.
     * This function will get all of the owning phoneable models.
     *
     * @return MorphTo
     */
    public function phoneable()
    {
        return $this->morphTo();
    }
}
