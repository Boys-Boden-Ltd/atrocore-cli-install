<?php
declare(strict_types=1);

namespace CliInstall;

use Atro\Core\ModuleManager\AbstractModule;
use Console\ApplicationInstaller;

class Module extends AbstractModule
{
    public static function getLoadOrder(): int
    {
        return 9999;
    }

    public function getConsoleCommands(): array
    {
        return [
            "install" => ApplicationInstaller::class,
        ];
    }
}
