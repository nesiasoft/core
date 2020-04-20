<?php

namespace Nesiasoft\Core\Tests\Approvals\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Approvals\Traits\HasApprovals;

class Document extends Model
{
    use HasApprovals;

    protected $guarded = [];
}
