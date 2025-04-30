<?php

namespace Dainaka\MakeServiceCmd\Providers;

use Illuminate\Support\ServiceProvider;

class MakeServiceCmdServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Set publicly available files
        $this->publishes([
            __DIR__ . '/../app/Console/Commands/MakeServiceCommand.php' => base_path('app/Console/Commands/MakeServiceCommand.php'),
        ], 'make-service-cmd');

        // Register the command
        if ($this->app->runningInConsole()) {
            $this->autoPublish();
        }
    }

    /**
     * Automatically publish the command file.
     */
    protected function autoPublish()
    {
        $source = __DIR__ . '/../app/Console/Commands/MakeServiceCommand.php';
        $destination = base_path('app/Console/Commands/MakeServiceCommand.php');

        // Check if the file already exists
        if (file_exists($destination)) {
            echo "The file 'MakeServiceCommand.php' already exists in 'app/Console/Commands'. Skipping auto-publish.\n";
            return;
        }

        // Create the directory if it does not exist
        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0755, true);
        }

        copy($source, $destination);

        echo "The file 'MakeServiceCommand.php' has been successfully published to 'app/Console/Commands'.\n";
    }
}
