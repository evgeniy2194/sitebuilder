<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Page;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRedditContentRequest extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $page;

    /**
     * SendRedditContentRequest constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send the content request
        $this->page->requestContent();
    }
}
