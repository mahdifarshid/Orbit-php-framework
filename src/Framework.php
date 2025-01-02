<?php

namespace Orbitphpframework\Orbit;

class Framework
{
    protected $commands = [
        'help' => 'Displays available commands',
        'make:controller' => 'Creates a new controller',
    ];

    public function run(string $command, array $args): void
    {
        switch ($command) {
            case 'help':
                $this->showHelp();
                break;

            case 'make:controller':
                $this->makeController($args);
                break;

            default:
                echo "Command '{$command}' not recognized. Use 'help' for a list of commands.\n";
        }
    }

    protected function showHelp(): void
    {
        echo "Available Commands:\n";
        foreach ($this->commands as $cmd => $desc) {
            echo "  {$cmd} - {$desc}\n";
        }
    }

    protected function makeController(array $args): void
    {
        $name = $args[0] ?? null;
        if (!$name) {
            echo "Please provide a name for the controller.\n";
            return;
        }
    
        $controllerDir = __DIR__ . "/Controllers";
        $controllerFile = $controllerDir . "/{$name}.php";
    
        // Ensure the Controllers directory exists
        if (!is_dir($controllerDir)) {
            mkdir($controllerDir, 0777, true);
        }
    
        $controllerContent = "<?php\n\nnamespace App\Controllers;\n\nclass {$name}\n{\n    public function index()\n    {\n        echo 'Hello from {$name}!';\n    }\n}\n";
    
        // Write the file
        if (file_put_contents($controllerFile, $controllerContent) !== false) {
            echo "Controller '{$name}' created successfully.\n";
        } else {
            echo "Failed to create controller '{$name}'.\n";
        }
    }
    
}
