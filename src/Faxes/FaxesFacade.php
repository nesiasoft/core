<?php

namespace Nesiasoft\Core\Faxes;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Faxes\Skeleton\SkeletonClass
 */
class FaxesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'faxes';
    }
}
