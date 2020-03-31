<?php

namespace Nesiasoft\Core\Tests\Phones;

use Nesiasoft\Core\Tests\Phones\Models\Supplier;

class PhonesTest extends TestCase
{
    /** @test */
    public function model_can_store_phones()
    {
        $supplier = Supplier::create([
            'name' => 'ABC, Inc.',
        ]);

        $supplier->phones()->create(['number' => '031-12345']);
        $supplier->phones()->create(['number' => '021-67890']);

        $this->assertCount(2, $supplier->phones);

        $this->assertSame('031-12345', $supplier->phones[0]->number);
        $this->assertSame('021-67890', $supplier->phones[1]->number);
    }
}
