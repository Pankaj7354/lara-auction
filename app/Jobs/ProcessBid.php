<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Bid;
use App\Events\LiveBidEvent;
use Illuminate\Support\Facades\Log;



class ProcessBid implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;       // Number of retry attempts
    public int $timeout = 30;    // Job timeout duration

    protected $bidId;            // Storing bid ID instead of full model

    /**
     * Create a new job instance.
     */
    public function __construct(Bid $bid)
    {
        $this->bidId = $bid->id; // Store only the ID to prevent serialization issues
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Fetch bid again to ensure fresh data
        $bid = Bid::with('user')->find($this->bidId);

        if (!$bid) {
            Log::error("ProcessBid Job: Bid with ID {$this->bidId} not found.");
            return;
        }

        // Broadcast the bid event
        broadcast(new LiveBidEvent($bid))->toOthers();
    }
}
