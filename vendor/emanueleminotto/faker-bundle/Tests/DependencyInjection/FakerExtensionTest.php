<?php

namespace EmanueleMinotto\FakerBundle\Tests\DependencyInjection;

use EmanueleMinotto\FakerBundle\Tests\AppKernel;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \EmanueleMinotto\FakerBundle\DependencyInjection\FakerExtension
 */
class FakerExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\HttpKernel\Kernel
     */
    private $kernel;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->kernel = new AppKernel('FakerExtensionTest', true);
        $this->kernel->boot();
    }

    /**
     * @covers ::load
     */
    public function testService()
    {
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->has('faker'));

        $faker = $container->get('faker');
        $this->assertInstanceOf('Faker\\Generator', $faker);

        $this->assertNotSame($faker->randomNumber, $faker->randomNumber);
    }

    /**
     * @covers ::load
     */
    public function testParameter()
    {
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->hasParameter('faker.locale'));
        $this->assertTrue($container->hasParameter('faker.seed'));
    }

    /**
     * @covers ::load
     */
    public function testSeedParameter()
    {
        $kernel = new AppKernel('FakerExtensionTest_testSeedParameter', true);
        $kernel->boot();

        $faker = $kernel->getContainer()->get('faker');

        $this->assertSame('Miss Lorna Dibbert', $faker->name);
        $this->assertSame('Litzy Emard', $faker->name);
    }
}
