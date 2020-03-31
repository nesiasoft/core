<?php

namespace Nesiasoft\Core\Tests\URLs;

use Nesiasoft\Core\Tests\URLs\Models\Brand;

class URLsTest extends TestCase
{
    /** @test */
    public function model_can_store_urls()
    {
        $brand = Brand::create([
            'name' => 'Pumba Shoes',
        ]);

        $brand->urls()->create(['path' => 'www.pumbashoe.dev']);
        $brand->urls()->create(['path' => 'www.pumba.dev']);

        $this->assertCount(2, $brand->urls);

        $this->assertSame('www.pumbashoe.dev', $brand->urls[0]->path);
        $this->assertSame('www.pumba.dev', $brand->urls[1]->path);
    }
}
