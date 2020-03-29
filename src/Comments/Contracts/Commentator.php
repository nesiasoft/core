<?php

namespace Nesiasoft\Core\Comments\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Commentator
{
    /**
     * Check if a comment for a specific model needs to be approved.
     * @param Model $model
     * @return bool
     */
    public function needsCommentApproval(Model $model): bool;
}
