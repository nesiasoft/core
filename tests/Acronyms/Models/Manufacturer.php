<?php

namespace Nesiasoft\Core\Tests\Acronyms\Models;

use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Acronyms\Traits\HasAcronyms;

class Manufacturer extends Model
{
    use HasAcronyms;

    protected $guarded = [];
}
