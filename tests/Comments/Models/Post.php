<?php

namespace Nesiasoft\Core\Tests\Comments\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Comments\Traits\HasComments;

class Post extends Model
{
    use HasComments;

    protected $guarded = [];
}
