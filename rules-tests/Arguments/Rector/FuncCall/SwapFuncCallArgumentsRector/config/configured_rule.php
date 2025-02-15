<?php

use Rector\Arguments\Rector\FuncCall\SwapFuncCallArgumentsRector;
use Rector\Arguments\ValueObject\SwapFuncCallArguments;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(SwapFuncCallArgumentsRector::class)
        ->call('configure', [[
            SwapFuncCallArgumentsRector::FUNCTION_ARGUMENT_SWAPS => ValueObjectInliner::inline(
                [new SwapFuncCallArguments('some_function', [1, 0])]
            ),
        ]]);
};
