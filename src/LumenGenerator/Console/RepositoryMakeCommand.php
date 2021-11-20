<?php

namespace kukuhkkh\LumenGenerator\Console;

use Symfony\Component\Console\Input\InputOption;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}Repository';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = null;
        if ($this->option('resource')) {
            $stub = '/stubs/repository.resource.stub';
        }

        $stub = isset($stub) ? $stub : '/stubs/repository.stub';

        return __DIR__.$stub;
    }

    /**
     * Build the model replacement values.
     *
     * @param  array  $replace
     * @return array
     */
    // protected function buildModelReplacements(array $replace)
    // {
    //     return array_merge($replace, [
    //         'DummyModelClass' => class_basename($modelClass),
    //     ]);
    // }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['resource', 'r', InputOption::VALUE_OPTIONAL, 'Generate a resource repository class.'],
        ];
    }
}
