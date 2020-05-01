<?php

namespace Nesiasoft\Core\Approvals\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Nesiasoft\Core\Approvals\Contracts\Approver;

trait HasApprovals
{
    /**
     * Return all approvals for this model.
     *
     * @return MorphMany
     */
    public function approvals()
    {
        return $this->morphMany(config('approvals.approval_class'), 'approvable');
    }

    /**
     * Attach a approve to this model as a specific user.
     *
     * @param Model $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function approveByUser(Model $user)
    {
        $approvalClass = config('approvals.approval_class');

        $approved_at = null;
        if ($user instanceof Approver) {
            if (! $user->approvalNeedsPermission($user)) {
                $approved_at = Carbon::now();
            }
        }

        $approval = new $approvalClass([
            'approvable_id' => $this->getKey(),
            'approvable_type' => get_class(),
            'user_id' => is_null($user) ? null : $user->getKey(),
            'approved_at' => $approved_at,
        ]);

        return $this->approvals()->save($approval);
    }
}
