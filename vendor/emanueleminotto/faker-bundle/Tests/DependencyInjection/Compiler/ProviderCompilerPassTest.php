<?php

namespace EmanueleMinotto\FakerBundle\Tests\DependencyInjection\Compiler;

use EmanueleMinotto\FakerBundle\DependencyInjection\Compiler\ProviderCompilerPass;
use EmanueleMinotto\FakerBundle\DependencyInjection\FakerExtension;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * @coversDefaultClass \EmanueleMinotto\FakerBundle\DependencyInjection\Compiler\ProviderCompilerPass
 */
class ProviderCompilerPassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->container = new ContainerBuilder();
        $extension = new FakerExtension();

        $this->container->registerExtension($extension);
        $this->container->loadFromExtension($extension->getAlias());
    }

    /**
     * @covers ::process
     */
    public function testProcess()
    {
        $mock = $this->getMock('Acme\Faker\CustomProvider');
        $provider = new Definition();
        $provider->setClass(get_class($mock));
        $provider->addTag('faker.provider');

        $this->container->setDefinition('acme.faker.custom', $provider);

        $this->container->addCompilerPass(new ProviderCompilerPass());
        $this->container->compile();

        $this->assertNotEmpty($this->container->get('faker'));
        $this->assertNotEmpty($this->container->get('acme.faker.custom'));

        $methods = $this->container->getDefinition('faker')->getMethodCalls();

        $this->assertNotEmpty($methods);
        $this->assertEquals('addProvider', $methods[0][0]);
        $this->assertInstanceOf('Symfony\Component\DependencyInjection\Reference', $methods[0][1][0]);
    }
}
