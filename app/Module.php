<?php
declare(strict_types=1);

namespace CliInstall;

use Atro\Core\ModuleManager\AbstractModule;
use Console\ApplicationInstaller;

class Module extends AbstractModule
{
    public static function getLoadOrder(): int
    {
        return 1000;
    }

    public function getConsoleCommands(): array
    {
        return [
            "CLI Install" => ApplicationInstaller::class,
        ];
    }
}
