<?php

namespace Nesiasoft\Core\Tests\Comments\Models;

use Nesiasoft\Core\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasComments;

    protected $guarded = [];
}