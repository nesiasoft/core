<?php

namespace Nesiasoft\Core;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Traits\HasComments;

class Comment extends Model
{
    use HasComments;

    protected $fillable = [
        'body',
        'user_id',
        'approved_at',
    ];

    protected $dates = [
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'boolean',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include approved comment.
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
     * One-to-Many Polymorph: An entity can have zero or many comments.
     * This function will get all of the owning commentable models.
     *
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A comment must have a commentator.
     * This function will retrieve the commenttor of a given comment.
     *
     * @return mixed
     */
    public function commentator()
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
            'approved' => null,
        ]);

        return $this;
    }

    /****************************************** MUTATOR ******************************************/

    protected function getAuthModelName()
    {
        if (config('comments.user_model')) {
            return config('comments.user_model');
        }

        if (! is_null(config('auth.providers.users.model'))) {
            return config('auth.providers.users.model');
        }

        throw new Exception('Could not determine the commentator model name.');
    }

}
