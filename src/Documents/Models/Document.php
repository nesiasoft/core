<?php

namespace Nesiasoft\Core\Documents\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Documents\Traits\HasDocuments;

class Document extends Model
{
    use HasDocuments;

    protected $fillable = [
        'number',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many documents.
     * This function will get all of the owning documentable models.
     *
     * @return MorphTo
     */
    public function documentable()
    {
        return $this->morphTo();
    }
}
