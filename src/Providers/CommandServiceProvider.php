<?php

namespace HuberwayCMS\DevTool\Providers;

use HuberwayCMS\Base\Supports\ServiceProvider;
use HuberwayCMS\DevTool\Commands\LocaleCreateCommand;
use HuberwayCMS\DevTool\Commands\LocaleRemoveCommand;
use HuberwayCMS\DevTool\Commands\Make\ControllerMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\FormMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\ModelMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\RepositoryMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\RequestMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\RouteMakeCommand;
use HuberwayCMS\DevTool\Commands\Make\TableMakeCommand;
use HuberwayCMS\DevTool\Commands\PackageCreateCommand;
use HuberwayCMS\DevTool\Commands\PackageMakeCrudCommand;
use HuberwayCMS\DevTool\Commands\PackageRemoveCommand;
use HuberwayCMS\DevTool\Commands\PluginCreateCommand;
use HuberwayCMS\DevTool\Commands\PluginMakeCrudCommand;
use HuberwayCMS\DevTool\Commands\RebuildPermissionsCommand;
use HuberwayCMS\DevTool\Commands\TestSendMailCommand;
use HuberwayCMS\DevTool\Commands\ThemeCreateCommand;
use HuberwayCMS\DevTool\Commands\WidgetCreateCommand;
use HuberwayCMS\DevTool\Commands\WidgetRemoveCommand;

class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            TableMakeCommand::class,
            ControllerMakeCommand::class,
            RouteMakeCommand::class,
            RequestMakeCommand::class,
            FormMakeCommand::class,
            ModelMakeCommand::class,
            RepositoryMakeCommand::class,
            PackageCreateCommand::class,
            PackageMakeCrudCommand::class,
            PackageRemoveCommand::class,
            TestSendMailCommand::class,
            RebuildPermissionsCommand::class,
            LocaleRemoveCommand::class,
            LocaleCreateCommand::class,
            PluginCreateCommand::class,
            PluginMakeCrudCommand::class,
            ThemeCreateCommand::class,
            WidgetCreateCommand::class,
            WidgetRemoveCommand::class,
        ]);
    }
}
