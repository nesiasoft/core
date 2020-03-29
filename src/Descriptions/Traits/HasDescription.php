<?php

namespace Nesiasoft\Core\Descriptions\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasDescription
{
    /**
     * Return a description for this model.
     *
     * @return MorphOne
     */
    public function description()
    {
        return $this->morphOne(config('descriptions.description_class'), 'descriptionable');
    }
}
