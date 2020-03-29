<?php

namespace Nesiasoft\Core\Tests\Emails\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Emails\Traits\HasEmails;

class Employee extends Model
{
    use HasEmails;

    protected $guarded = [];
}
