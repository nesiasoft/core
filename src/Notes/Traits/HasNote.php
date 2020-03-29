<?php

namespace Nesiasoft\Core\Notes\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasNote
{
    /**
     * Return a note for this model.
     *
     * @return MorphOne
     */
    public function note()
    {
        return $this->morphOne(config('notes.note_class'), 'noteable');
    }
}
