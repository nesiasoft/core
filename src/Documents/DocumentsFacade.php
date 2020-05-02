<?php

namespace Nesiasoft\Core\Documents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Documents\Skeleton\SkeletonClass
 */
class DocumentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'documents';
    }
}
