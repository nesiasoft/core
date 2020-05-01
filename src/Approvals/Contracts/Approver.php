<?php

namespace Nesiasoft\Core\Approvals\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Approver
{
    /**
     * Check if an approval for a specific model needs to be approved.
     * @param Model $model
     * @return bool
     */
    public function approvalNeedsPermission(Model $model): bool;
}
