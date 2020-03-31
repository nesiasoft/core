<?php

namespace Nesiasoft\Core\Bookmarks\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasBookmarks
{
    /**
     * Return all bookmarks for this model.
     *
     * @return MorphMany
     */
    public function bookmarks()
    {
        return $this->morphMany(config('bookmarks.bookmark_class'), 'bookmarkable');
    }
}
