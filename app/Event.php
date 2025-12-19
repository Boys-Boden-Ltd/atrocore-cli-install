<?php

namespace CliInstall;

use Atro\Core\ModuleManager\AfterInstallAfterDelete;

class Event extends AfterInstallAfterDelete
{
    public function afterInstall(): void
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

