<?php

namespace HuberwayCMS\DevTool\Commands\Make;

use HuberwayCMS\DevTool\Commands\Abstracts\BaseMakeCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand('cms:make:controller', 'Make a controller')]
class ControllerMakeCommand extends BaseMakeCommand implements PromptsForMissingInput
{
    public function handle(): int
    {
        if (! preg_match('/^[a-z0-9\-_]+$/i', $this->argument('name'))) {
            $this->components->error('Only alphabetic characters are allowed.');

            return self::FAILURE;
        }

        $name = $this->argument('name');
        $path = platform_path(strtolower($this->argument('module')) . '/src/Http/Controllers/' . ucfirst(Str::studly($name)) . 'Controller.php');

        $this->publishStubs($this->getStub(), $path);
        $this->renameFiles($name, $path);
        $this->searchAndReplaceInFiles($name, $path);
        $this->line('------------------');

        $this->components->info('Created successfully <comment>' . $path . '</comment>!');

        return self::SUCCESS;
    }

    public function getStub(): string
    {
        return __DIR__ . '/../../../stubs/module/src/Http/Controllers/{Name}Controller.stub';
    }

    public function getReplacements(string $replaceText): array
    {
        $module = explode('/', $this->argument('module'));
        $module = strtolower(end($module));

        return [
            '{Module}' => ucfirst(Str::camel($module)),
        ];
    }

    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::REQUIRED, 'The table that you want to create');
        $this->addArgument('module', InputArgument::REQUIRED, 'The module name');
    }
}