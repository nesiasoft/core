<?php

namespace Nesiasoft\Core\Acronyms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Acronyms\Skeleton\SkeletonClass
 */
class AcronymsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'acronyms';
    }
}
