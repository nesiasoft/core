<?php

namespace Nesiasoft\Core\Tests\Faxes\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Faxes\Traits\HasFaxes;

class Company extends Model
{
    use HasFaxes;

    protected $guarded = [];
}
