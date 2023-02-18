<?php

namespace App\Jobs;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewVisitorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public int $refereed_by, public ?string $ip)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $visitor = Visitor::query()->where('refereed_by', $this->refereed_by);
            $visitor->increment('times');
            $visitor->firstOrFail()->watchDetails()->create(['ip_address' => $this->ip]);
        } catch (\Exception $exception) {
            Visitor::query()->create(['refereed_by' => $this->refereed_by, 'times' => 1])->watchDetails()
                ->create(['ip_address' => $this->ip]);
        }
    }
}
