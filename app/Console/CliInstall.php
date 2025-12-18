<?php
declare(strict_types=1);

namespace CliInstall\Console;

use Atro\Console\AbstractConsole;
use Atro\Services\Installer;
use Atro\Core\Exceptions;

class CliInstall extends AbstractConsole
{
    public static function getDescription(): string 
    {
        return 'This command performs the required processes to install the application without using the web installer.';
    }

    public function run(array $data): void 
    {
        $installer = $this->getContainer()->get(Installer::class);

        if ($installer->isInstalled()) {
            throw new Exceptions\Forbidden();
        }

        $installer->setLanguage('en_US');

        $installer->setDbSettings([
            'driver'   => 'pdo_pgsql',
            'host'     => 'db',
            'port'     => '',
            'dbname'   => 'atropim_dev',
            'user'     => 'dev_user',
            'password' => 'dev_pass_123',
        ]);

        $installer->createAdmin([
            'username'         => 'admin',
            'password'         => 'admin',
            'confirmPassword'  => 'admin',
            'reportingEnabled' => false,
        ]);
        self::show('Install has completed successfully');
    }
}
