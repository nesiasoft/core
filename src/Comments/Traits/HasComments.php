<?php

namespace Nesiasoft\Core\Comments\Traits;


use Illuminate\Database\Eloquent\Model;
use Nesiasoft\Core\Contracts\Commentator;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

        $comment = new $commentClass([
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
            'body' => $body,
            'user_id' => is_null($user) ? null : $user->getKey(),
            'approved_at' => ($user instanceof Commentator) ? 
                                ! $user->needsCommentApproval($this) : null,
        ]);

        return $this->comments()->save($comment);
    }

}