<?php

namespace Nesiasoft\Core\Tests\Faxes;

use Nesiasoft\Core\Tests\Faxes\Models\Company;

class FaxesTest extends TestCase
{
    /** @test */
    public function model_can_store_faxes()
    {
        $company = Company::create([
            'name' => 'Acme, Inc.',
        ]);

        $company->faxes()->create(['number' => '012345']);
        $company->faxes()->create(['number' => '067891']);

        $this->assertCount(2, $company->faxes);

        $this->assertSame('012345', $company->faxes[0]->number);
        $this->assertSame('067891', $company->faxes[1]->number);
    }
}
