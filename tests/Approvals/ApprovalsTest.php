<?php

namespace Nesiasoft\Core\Tests\Approvals;

use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Approvals\Models\Approval;
use Nesiasoft\Core\Tests\Approvals\Models\Approver;
use Nesiasoft\Core\Tests\Approvals\Models\Document;

class ApprovalsTest extends TestCase
{
    /** @test */
    public function model_can_store_approvals()
    {
        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $document->approvals()->create(['user_id' => 1]);
        $document->approvals()->create(['user_id' => 2]);

        $this->assertCount(2, $document->approvals);
    }

    /** @test */
    public function approval_without_user_has_no_relation()
    {
        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approve();

        $this->assertNull($approval->approver);
        $this->assertNull($approval->user_id);
    }

    /** @test */
    public function approval_can_be_posted_as_authenticated_user()
    {
        $user = User::first();

        auth()->login($user);

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approve();

        $this->assertSame($user->toArray(), $approval->approver->toArray());
    }

    /** @test */
    public function approval_can_be_posted_as_different_user()
    {
        $user = User::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveAsUser($user);

        $this->assertSame($user->toArray(), $approval->approver->toArray());
    }

    /** @test */
    public function comment_can_be_approved()
    {
        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approve('this is a comment');

        $this->assertNull($approval->approved_at);

        $approval->approve();

        $this->assertNotNull($approval->approved_at);
    }

    /** @test */
    public function comment_can_be_disapproved()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveAsUser($user);

        $approval->disapprove();

        $this->assertNull($approval->approved_at);
    }

    /** @test */
    public function approve_resolves_the_approved_model()
    {
        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approve();

        $this->assertSame($approval->approveable->id, $document->id);
        $this->assertSame($approval->approveable->number, $document->number);
    }

    /** @test */
    public function user_can_be_auto_approved()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveAsUser($user);

        $this->assertNotNull($approval->approved_at);
    }

    /** @test */
    public function comment_has_an_approved_scope()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $document->approve($user);
        $document->approveAsUser($user);

        $this->assertCount(2, $document->approvals);
        $this->assertCount(1, $document->approvals()->approved()->get());
    }
}
