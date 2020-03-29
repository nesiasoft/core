<?php

namespace Nesiasoft\Core\Tests\Notes\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Notes\Traits\HasNote;

class Order extends Model
{
    use HasNote;

    protected $guarded = [];
}
