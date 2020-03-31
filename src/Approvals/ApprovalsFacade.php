<?php

namespace Nesiasoft\Core\Approvals;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Approvals\Skeleton\SkeletonClass
 */
class ApprovalsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'approvals';
    }
}
