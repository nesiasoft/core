<?php

namespace Nesiasoft\Core\Tests\Acronyms;

use Nesiasoft\Core\Tests\Acronyms\Models\Manufacturer;

class AcronymsTest extends TestCase
{
    /** @test */
    public function model_can_store_acronyms()
    {
        $manufacturer = Manufacturer::create([
            'name' => 'Mercedes-Benz',
        ]);

        $manufacturer->acronyms()->create(['name' => 'Mercy']);
        $manufacturer->acronyms()->create(['name' => 'Mercedes-AMG']);

        $this->assertCount(2, $manufacturer->acronyms);

        $this->assertSame('Mercy', $manufacturer->acronyms[0]->name);
        $this->assertSame('Mercedes-AMG', $manufacturer->acronyms[1]->name);
    }
}
