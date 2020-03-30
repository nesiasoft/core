<?php

namespace Nesiasoft\Core\Phones\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasPhones
{
    /**
     * Return all phones for this model.
     *
     * @return MorphMany
     */
    public function phones()
    {
        return $this->morphMany(config('phones.phone_class'), 'phoneable');
    }
}
