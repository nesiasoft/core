<?php

namespace Nesiasoft\Core\Bookmarks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Bookmarks\Traits\HasBookmarks;

class Bookmark extends Model
{
    use HasBookmarks;

    protected $fillable = [
        'permalink',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many bookmarks.
     * This function will get all of the owning bookmarkable models.
     *
     * @return MorphTo
     */
    public function bookmarkable()
    {
        return $this->morphTo();
    }
}
