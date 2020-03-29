<?php

namespace Nesiasoft\Core\Emails\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Emails\Traits\HasEmail;

class Email extends Model
{
    use HasEmail;

    protected $fillable = [
        'body',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many emails.
     * This function will get all of the owning emailable models.
     *
     * @return MorphTo
     */
    public function emailable()
    {
        return $this->morphTo();
    }
}
