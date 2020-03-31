<?php

namespace Nesiasoft\Core\Approvals\Traits;

use Illuminate\Database\Eloquent\Model;

trait CanApprove
{
    /**
     * Check if an approval for a specific model needs to be approved.
     * @param Model $model
     * @return bool
     */
    public function approvalNeedsPermission(Model $model): bool
    {
        return true;
    }
}
