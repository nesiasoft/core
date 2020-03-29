<?php

namespace Nesiasoft\Core\Tests\Descriptions\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Descriptions\Traits\HasDescription;

class Product extends Model
{
    use HasDescription;

    protected $guarded = [];
}
