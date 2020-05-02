<?php

namespace Nesiasoft\Core\Tests\Documents;

use Nesiasoft\Core\Tests\Documents\Models\Employee;

class DocumentsTest extends TestCase
{
    /** @test */
    public function model_can_store_documents()
    {
        $employee = Employee::create([
            'name' => 'Mr. Employee',
        ]);

        $employee->documents()->create(['number' => 'DOC-001']);
        $employee->documents()->create(['number' => 'DOC-002']);

        $this->assertCount(2, $employee->documents);

        $this->assertSame('DOC-001', $employee->documents[0]->number);
        $this->assertSame('DOC-002', $employee->documents[1]->number);
    }
}
