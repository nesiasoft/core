<?php

namespace Nesiasoft\Core\Tests\Phones\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Phones\Traits\HasPhones;

class Supplier extends Model
{
    use HasPhones;

    protected $guarded = [];
}
