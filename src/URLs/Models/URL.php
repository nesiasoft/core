<?php

namespace Nesiasoft\Core\URLs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\URLs\Traits\HasURLs;

class URL extends Model
{
    use HasURLs;

    protected $table = 'urls';

    protected $fillable = [
        'path',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or one url.
     * This function will get all of the owning urlable models.
     *
     * @return MorphTo
     */
    public function urlable()
    {
        return $this->morphTo();
    }
}
