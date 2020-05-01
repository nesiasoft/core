<?php

namespace Nesiasoft\Core\Tests\Approvals;

use Illuminate\Foundation\Auth\User;
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
    public function approval_can_be_posted_as_different_user()
    {
        $user = User::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveByUser($user);

        $this->assertSame($user->toArray(), $approval->approver->toArray());
    }

    /** @test */
    public function model_can_be_approved()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveByUser($user);

        $this->assertNotNull($approval->approved_at);
    }

    /** @test */
    public function mdoel_can_be_disapproved()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveByUser($user);

        $approval->disapprove();

        $this->assertNull($approval->approved_at);
    }

    /** @test */
    public function user_can_be_auto_approved()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveByUser($user);

        $this->assertNotNull($approval->approved_at);
    }

    /** @test */
    public function model_has_an_approved_scope()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $document->approveByUser($user);
        $document->approveByUser($user);

        $this->assertCount(2, $document->approvals);
        $this->assertCount(2, $document->approvals()->approved()->get());
    }
}
