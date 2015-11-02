<?php

namespace EmanueleMinotto\FakerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class FakerExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values.
     * @param ContainerBuilder $container A ContainerBuilder instance.
     *
     * @throws \InvalidArgumentException If tag is not defined.
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configs = $this->processConfiguration($configuration, $configs);

        if ($configs['twig']) {
            $this->loadTwigExtension($container);
        }

        $loader = new Loader\XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        // if defined override the faker.locale parameter
        if ($configs['locale']) {
            $container->setParameter('faker.locale', $configs['locale']);
        }

        // if defined override the faker.seed parameter
        if ($configs['seed']) {
            $container->setParameter('faker.seed', $configs['seed']);
        }

        if (trim($container->getParameter('faker.seed'))) {
            $container->getDefinition('faker')->addMethodCall('seed', [
                $container->getParameter('faker.seed'),
            ]);
        }
    }

    /**
     * Loads the Twig global variable.
     *
     * @param ContainerBuilder $container
     */
    private function loadTwigExtension(ContainerBuilder $container)
    {
        $service = new Definition(
            'EmanueleMinotto\FakerBundle\Twig\FakerGeneratorExtension',
            array(
                new Reference('faker'),
            )
        );
        $service->addTag('twig.extension');
        $service->setPublic(false);

        $container->setDefinition('emanuele.minotto.faker.twig.extension', $service);
    }
}
