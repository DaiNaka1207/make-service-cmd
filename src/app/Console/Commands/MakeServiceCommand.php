<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $servicePath = app_path("Services/{$name}.php");

        // Display failure messages on command line
        if (File::exists($servicePath)) {
            $this->line(' ');
            $this->line('  <error> ERROR </error> Service already exists.');
            return Command::FAILURE;
        }

        // Create the directory if it does not exist
        if (!File::exists(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        // Service class template
        $template = <<<EOT
            <?php

            namespace App\Services;

            class {$name}
            {
                public function __construct()
                {
                    //
                }
            }
            EOT;

        // Create the service class file
        File::put($servicePath, $template);

        // Display success messages on command line
        $this->line(' ');
        $this->line("  <bg=blue;fg=white> INFO </> Service [app/Services/{$name}.php] created successfully.");
        $this->line(' ');
        return Command::SUCCESS;
    }
}
