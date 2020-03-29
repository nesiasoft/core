<?php

namespace Nesiasoft\Core\Descriptions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Descriptions\Skeleton\SkeletonClass
 */
class DescriptionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'descriptions';
    }
}
