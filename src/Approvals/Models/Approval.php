<?php

namespace Nesiasoft\Core\Approvals\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Nesiasoft\Core\Approvals\Traits\HasApprovals;

class Approval extends Model
{
    use HasApprovals;

    protected $fillable = [
        'user_id',
        'approved_at',
    ];

    protected $dates = [
        'approved_at',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include approved approval.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved(Builder $query)
    {
        return $query->whereNotNull('approved_at');
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many Polymorph: An entity can have zero or many approvals.
     * This function will get all of the owning approvable models.
     *
     * @return MorphTo
     */
    public function approvable()
    {
        return $this->morphTo();
    }

    /**
     * A approval must have an approver.
     * This function will retrieve the approver of a given approval.
     *
     * @return BelongsTo
     */
    public function approver()
    {
        return $this->belongsTo($this->getAuthModelName(), 'user_id');
    }

    /****************************************** METHOD *******************************************/

    public function approve()
    {
        $this->update([
            'approved_at' => Carbon::now(),
        ]);

        return $this;
    }

    public function disapprove()
    {
        $this->update([
            'approved_at' => null,
        ]);

        return $this;
    }

    /****************************************** MUTATOR ******************************************/

    protected function getAuthModelName()
    {
        if (config('approvals.user_model')) {
            return config('approvals.user_model');
        }

        if (! is_null(config('auth.providers.users.model'))) {
            return config('auth.providers.users.model');
        }

        throw new Exception('Could not determine the approver model name.');
    }
}
