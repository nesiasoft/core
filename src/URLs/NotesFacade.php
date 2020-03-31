<?php

namespace Nesiasoft\Core\URLs;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\URLs\Skeleton\SkeletonClass
 */
class URLsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'urls';
    }
}
