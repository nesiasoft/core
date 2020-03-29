<?php

namespace Nesiasoft\Core\Tests\Descriptions;

use Nesiasoft\Core\Tests\Descriptions\Models\Product;

class DescriptionsTest extends TestCase
{
    /** @test */
    public function model_can_store_a_description()
    {
        $product = Product::create([
            'name' => 'Some product',
        ]);

        $product->description()->create([
            'body' => 'this is a description',
        ]);

        $this->assertSame('this is a description', $product->description->body);
    }
}
