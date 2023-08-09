<?php

namespace App\Console\Commands;

use App\Models\AuthToken;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class ClearExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-expired-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear expired tokens';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        AuthToken::where('expires_at', '<', Carbon::now())->delete();
        $this->info('Expired tokens were removed.');
    }
}
