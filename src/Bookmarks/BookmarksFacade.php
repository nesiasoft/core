<?php

namespace Nesiasoft\Core\Bookmarks;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Bookmarks\Skeleton\SkeletonClass
 */
class BookmarksFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bookmarks';
    }
}
