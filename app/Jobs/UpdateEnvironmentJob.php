<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class UpdateEnvironmentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Array of environment key that can be updated
     * 
     * @var array
     */
    public array $arrayCanBeUpdated = [
        'CUST_AUTH_FIELD',
        'CUST_AUTH_PASSWORD',
    ];

    /**
     * Create a new job instance.
     */
    public function __construct(
        public array $keyValueEnvironment
    ) { }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Filter $keyValueEnvironment for only specific keys
        $this->keyValueEnvironment = array_filter($this->keyValueEnvironment, function ($key) {
            return in_array($key, $this->arrayCanBeUpdated);
        }, ARRAY_FILTER_USE_KEY);

        // Pattern
        $pattern = '/([^\=]*)\=[^\n]*/';
        // File .env
        $envFile = base_path('.env');
        // Get file content .env
        $lines = file($envFile);

        $newLines = [];
        foreach ($lines as $line) {
            preg_match($pattern, $line, $matches);
    
            if (!count($matches)) {
                $newLines[] = $line;
                continue;
            }
    
            if (!key_exists(trim($matches[1]), $this->keyValueEnvironment)) {
                $newLines[] = $line;
                continue;
            }
    
            $line = trim($matches[1]) . "={$this->keyValueEnvironment[trim($matches[1])]}\n";
            $newLines[] = $line;
        }
    
        $newContent = implode('', $newLines);

        file_put_contents($envFile, $newContent);

        $this->updateEnvironment();
    }

    /**
     * Update environment
     */
    private function updateEnvironment()
    {
        $cachedConfigFile = base_path('/bootstrap/cache/config.php');
        if(
            (
                file_exists($cachedConfigFile) && // Check is environment is cached or not by checking file cache config.php
                is_writable($cachedConfigFile)
            ) ||
            app()->isProduction() // run what is in environment production
        ) {
            // Clear config cache, and cache it again
            Artisan::command('config:cache');
        }
    }
}
