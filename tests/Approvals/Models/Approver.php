<?php

namespace Nesiasoft\Core\Tests\Approvals\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Approver extends User
{
    protected $table = 'users';

    public function approvalNeedsPermission(Model $model): bool
    {
        return false;
    }
}
