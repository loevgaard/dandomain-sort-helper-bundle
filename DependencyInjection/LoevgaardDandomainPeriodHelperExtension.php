<?php
namespace Loevgaard\DandomainPeriodHelperBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class LoevgaardDandomainPeriodHelperExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('loevgaard_dandomain_period_helper.offset',                $config['offset']);
        $container->setParameter('loevgaard_dandomain_period_helper.year_begin',            $config['year_begin']);
        $container->setParameter('loevgaard_dandomain_period_helper.period_weekday_begin',  $config['period_weekday_begin']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
