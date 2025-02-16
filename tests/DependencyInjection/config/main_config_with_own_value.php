<?php

declare(strict_types=1);

use Rector\Renaming\Rector\Name\RenameClassRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(RenameClassRector::class)
        ->call('configure', [[
            RenameClassRector::OLD_TO_NEW_CLASSES => [
                'old_3' => 'new_3',
            ],
        ]])
        ->call('configure', [[
            RenameClassRector::OLD_TO_NEW_CLASSES => [
                'old_4' => 'new_4',
            ],
        ]]);

    $containerConfigurator->import(__DIR__ . '/first_config.php');
    $containerConfigurator->import(__DIR__ . '/second_config.php');
};
