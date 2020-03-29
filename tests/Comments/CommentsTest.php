<?php

namespace Nesiasoft\Core\Tests\Comments;

use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Tests\Comments\Models\ApprovedUser;
use Nesiasoft\Core\Tests\Comments\Models\Post;

class CommentsTest extends TestCase
{
    /** @test */
    public function user_without_commentator_interface_do_not_get_approved()
    {
        $post = Post::create([
            'title' => 'Some post',
        ]);

        $post->comment('this is a comment');

        $comment = $post->comments()->first();

        $this->assertNull($comment->approved_at);
    }

    /** @test */
    public function model_can_store_comments()
    {
        $post = Post::create([
            'title' => 'Some post',
        ]);

        $post->comment('this is a comment');
        $post->comment('this is a different comment');

        $this->assertCount(2, $post->comments);

        $this->assertSame('this is a comment', $post->comments[0]->body);
        $this->assertSame('this is a different comment', $post->comments[1]->body);
    }

    /** @test */
    public function comment_without_user_has_no_relation()
    {
        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->comment('this is a comment');

        $this->assertNull($comment->commentator);
        $this->assertNull($comment->user_id);
    }

    /** @test */
    public function comment_can_be_posted_as_authenticated_user()
    {
        $user = User::first();

        auth()->login($user);

        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->comment('this is a comment');

        $this->assertSame($user->toArray(), $comment->commentator->toArray());
    }

    /** @test */
    public function comment_can_be_posted_as_different_user()
    {
        $user = User::first();

        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->commentAsUser($user, 'this is a comment');

        $this->assertSame($user->toArray(), $comment->commentator->toArray());
    }

    /** @test */
    public function comment_can_be_approved()
    {
        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->comment('this is a comment');

        $this->assertNull($comment->approved_at);

        $comment->approve();

        $this->assertNotNull($comment->approved_at);
    }

    /** @test */
    public function comment_resolves_the_commented_model()
    {
        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->comment('this is a comment');

        $this->assertSame($comment->commentable->id, $post->id);
        $this->assertSame($comment->commentable->title, $post->title);
    }

    /** @test */
    public function user_can_be_auto_approved()
    {
        $user = ApprovedUser::first();

        $post = Post::create([
            'title' => 'Some post',
        ]);

        $comment = $post->commentAsUser($user, 'this is a comment');

        $this->assertNotNull($comment->approved_at);
    }

    /** @test */
    public function comment_has_an_approved_scope()
    {
        $user = ApprovedUser::first();

        $post = Post::create([
            'title' => 'Some post',
        ]);

        $post->comment('this comment is not approved');
        $post->commentAsUser($user, 'this comment is approved');

        $this->assertCount(2, $post->comments);
        $this->assertCount(1, $post->comments()->approved()->get());

        $this->assertSame('this comment is approved', $post->comments()->approved()->first()->body);
    }
}
