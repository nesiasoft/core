<?php

namespace Nesiasoft\Core\Comments;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Comments\Skeleton\SkeletonClass
 */
class CommentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'comments';
    }
}
