<?php

namespace Nesiasoft\Core\Emails;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Emails\Skeleton\SkeletonClass
 */
class EmailsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'emails';
    }
}
