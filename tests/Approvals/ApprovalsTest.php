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

        $document->approvals()->create(['approved_by' => 1]);
        $document->approvals()->create(['approved_by' => 2]);

        $this->assertCount(2, $document->approvals);
    }

    /** @test */
    public function model_can_not_be_approved_by_user_who_are_not_approver()
    {
        $user = User::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveBy($user);

        $this->assertNull($approval->approved_at);
    }

    /** @test */
    public function model_can_be_approved_by_approver()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveBy($user);

        $this->assertNotNull($approval->approved_at);
    }

    /** @test */
    public function mdoel_can_be_disapproved_by_approver()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $approval = $document->approveBy($user);

        $approval->disapprove();

        $this->assertNull($approval->approved_at);
    }

    /** @test */
    public function model_has_an_approved_scope()
    {
        $user = Approver::first();

        $document = Document::create([
            'number' => 'DOC-001',
        ]);

        $document->approveBy($user);
        $document->approveBy($user);

        $this->assertCount(2, $document->approvals);
        $this->assertCount(2, $document->approvals()->approved()->get());
    }
}
