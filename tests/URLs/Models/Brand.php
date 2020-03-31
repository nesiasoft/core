<?php

namespace Nesiasoft\Core\Tests\URLs\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\URLs\Traits\HasURLs;

class Brand extends Model
{
    use HasURLs;

    protected $guarded = [];
}
