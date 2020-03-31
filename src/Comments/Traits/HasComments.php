<?php

namespace Nesiasoft\Core\Comments\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Nesiasoft\Core\Comments\Contracts\Commentator;

trait HasComments
{
    /**
     * Return all comments for this model.
     *
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(config('comments.comment_class'), 'commentable');
    }

    /**
     * Attach a comment to this model.
     *
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function comment(string $comment)
    {
        return $this->commentAsUser(auth()->user(), $comment);
    }

    /**
     * Attach a comment to this model as a specific user.
     *
     * @param Model|null $user
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function commentAsUser(?Model $user, string $body)
    {
        $commentClass = config('comments.comment_class');

        $approved_at = null;
        if ($user instanceof Commentator) {
            if (! $user->needsCommentApproval($user)) {
                $approved_at = Carbon::now();
            }
        }

        $comment = new $commentClass([
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
            'body' => $body,
            'user_id' => is_null($user) ? null : $user->getKey(),
            'approved_at' => $approved_at,
        ]);

        return $this->comments()->save($comment);
    }
}
