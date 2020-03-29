<?php

namespace Nesiasoft\Core\Descriptions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Descriptions\Traits\HasDescription;

class Description extends Model
{
    use HasDescription;

    protected $fillable = [
        'body',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or one description.
     * This function will get all of the owning descriptionable models.
     *
     * @return MorphTo
     */
    public function descriptionable()
    {
        return $this->morphTo();
    }
}
