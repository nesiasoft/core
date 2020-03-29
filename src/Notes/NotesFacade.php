<?php

namespace Nesiasoft\Core\Notes;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nesiasoft\Core\Notes\Skeleton\SkeletonClass
 */
class NotesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notes';
    }
}
