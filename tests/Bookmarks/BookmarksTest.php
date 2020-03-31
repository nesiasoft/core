<?php

namespace Nesiasoft\Core\Tests\Bookmarks;

use Nesiasoft\Core\Tests\Bookmarks\Models\Core;

class BookmarksTest extends TestCase
{
    /** @test */
    public function model_can_store_bookmarks()
    {
        $core = Core::create();

        $core->bookmarks()->create(['permalink' => '/bookmark/to/something']);
        $core->bookmarks()->create(['permalink' => '/bookmark/to/other-thing']);

        $this->assertCount(2, $core->bookmarks);

        $this->assertSame('/bookmark/to/something', $core->bookmarks[0]->permalink);
        $this->assertSame('/bookmark/to/other-thing', $core->bookmarks[1]->permalink);
    }
}
