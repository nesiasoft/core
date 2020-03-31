<?php

namespace Nesiasoft\Core\URLs\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasURLs
{
    /**
     * Return all URLs for this model.
     *
     * @return MorphMany
     */
    public function urls()
    {
        return $this->MorphMany(config('urls.url_class'), 'urlable');
    }
}
