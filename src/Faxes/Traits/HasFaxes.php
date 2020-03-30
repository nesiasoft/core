<?php

namespace Nesiasoft\Core\Faxes\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFaxes
{
    /**
     * Return all faxes for this model.
     *
     * @return MorphMany
     */
    public function faxes()
    {
        return $this->morphMany(config('faxes.fax_class'), 'faxable');
    }
}
