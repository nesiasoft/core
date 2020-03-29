<?php

namespace Nesiasoft\Core\Tests\Notes;

use Nesiasoft\Core\Tests\Notes\Models\Order;

class NotesTest extends TestCase
{
    /** @test */
    public function model_can_store_a_note()
    {
        $order = Order::create([
            'number' => 'Order #001',
        ]);

        $order->note()->create([
            'body' => 'this is a note',
        ]);

        $this->assertSame('this is a note', $order->note->body);
    }
}
