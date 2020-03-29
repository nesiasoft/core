<?php

namespace Nesiasoft\Core\Tests\Emails;

use Nesiasoft\Core\Tests\Emails\Models\Employee;

class EmailsTest extends TestCase
{
    /** @test */
    public function model_can_store_emails()
    {
        $employee = Employee::create([
            'name' => 'Mr. Employee',
        ]);

        $employee->emails()->create(['address' => 'mr.employee1@test.dev']);
        $employee->emails()->create(['address' => 'mr.employee2@test.dev']);

        $this->assertCount(2, $employee->emails);

        $this->assertSame('mr.employee1@test.dev', $employee->emails[0]->address);
        $this->assertSame('mr.employee2@test.dev', $employee->emails[1]->address);
    }
}
