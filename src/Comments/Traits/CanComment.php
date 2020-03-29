<?php

namespace Nesiasoft\Core\Comments\Traits;

use Illuminate\Database\Eloquent\Model;

trait CanComment
{
    /**
     * Check if a comment for a specific model needs to be approved.
     * @param Model $model
     * @return bool
     */
    public function needsCommentApproval(Model $model): bool
    {
        return true;
    }
}
