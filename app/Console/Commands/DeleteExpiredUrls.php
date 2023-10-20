<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

class DeleteExpiredUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes urls that were not visited for the past 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $thresholdDate = getThresholdDate();
        $expiredUrls = Url::where('updated_at', '<', $thresholdDate)->get();
        foreach ($expiredUrls as $url) {
            $url->delete();
        }

        $this->info('Expired urls have been deleted.');
    }
}
