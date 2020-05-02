<?php

namespace Nesiasoft\Core\Tests\Documents\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Documents\Traits\HasDocuments;

class Employee extends Model
{
    use HasDocuments;

    protected $guarded = [];
}
