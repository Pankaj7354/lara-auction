<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Bid;

class LiveBidEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bid;

    /**
     * Create a new event instance.
     */
    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        return new PrivateChannel('live-bid-channel.' . $this->bid->product_id);
    }

    /**
     * Event name for broadcasting.
     */
    public function broadcastAs(): string
    {
        return 'Next-bid-event';
    }

    /**
     * Data to be broadcasted.
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->bid->id,
            'amount' => $this->bid->amount,
            'user' => [
                'name' => $this->bid->user->name,
            ],
            'created_at' => $this->bid->created_at->diffForHumans(),
        ];
    }
}
