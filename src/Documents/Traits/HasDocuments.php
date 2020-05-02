<?php

namespace Nesiasoft\Core\Documents\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasDocuments
{
    /**
     * Return all documents for this model.
     *
     * @return MorphMany
     */
    public function documents()
    {
        return $this->morphMany(config('documents.document_class'), 'documentable');
    }
}
