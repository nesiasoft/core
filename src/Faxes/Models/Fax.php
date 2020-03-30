<?php

namespace Nesiasoft\Core\Faxes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Faxes\Traits\HasFaxes;

class Fax extends Model
{
    use HasFaxes;

    protected $fillable = [
        'address',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many faxes.
     * This function will get all of the owning faxable models.
     *
     * @return MorphTo
     */
    public function faxable()
    {
        return $this->morphTo();
    }
}
