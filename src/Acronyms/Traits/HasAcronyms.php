<?php

namespace Nesiasoft\Core\Acronyms\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAcronyms
{
    /**
     * Return all acronyms for this model.
     *
     * @return MorphMany
     */
    public function acronyms()
    {
        return $this->morphMany(config('acronyms.acronym_class'), 'acronymable');
    }
}
