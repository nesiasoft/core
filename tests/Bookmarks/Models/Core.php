<?php

namespace Nesiasoft\Core\Tests\Bookmarks\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Bookmarks\Traits\HasBookmarks;

class Core extends Model
{
    use HasBookmarks;

    protected $guarded = [];
}
