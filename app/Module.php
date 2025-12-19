<?php
declare(strict_types=1);

namespace CliInstall;

use Atro\Core\ModuleManager\AbstractModule;
use CliInstall\Console\ApplicationInstall;

class Module extends AbstractModule
{
    public static function getLoadOrder(): int
    {
        return 5110;
    }

    public function getConsoleCommands(): array
    {
        return [
            "install" => ApplicationInstall::class,
        ];
    }
}
