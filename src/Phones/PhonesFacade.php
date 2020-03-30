<?php

namespace Nesiasoft\Core\Phones;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Phones\Skeleton\SkeletonClass
 */
class PhonesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'phones';
    }
}
