<?php

namespace Nesiasoft\Core\Tests\Approvals\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Approvals\Contracts\Approver as ContractsApprover;

class Approver extends User implements ContractsApprover
{
    protected $table = 'users';

    public function approvalNeedsPermission(Model $model): bool
    {
        return false;
    }
}
