<?php

namespace Nesiasoft\Core\Tests\Comments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Comments\Contracts\Commentator;

class ApprovedUser extends User implements Commentator
{
    protected $table = 'users';

    public function needsCommentApproval(Model $model): bool
    {
        return false;
    }
}
