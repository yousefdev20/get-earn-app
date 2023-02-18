<?php

namespace App\Services;

use Illuminate\Support\Facades\Queue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitorsWatch
{
    public function __construct(protected ShouldQueue $job, protected ?string $queue)
    {
    }

    public function push(): mixed
    {
        return Queue::pushOn($this->queue, $this->job);
    }
}
