<?php

namespace EmanueleMinotto\FakerBundle\Tests\Twig;

use EmanueleMinotto\FakerBundle\Tests\AppKernel;
use EmanueleMinotto\FakerBundle\Twig\FakerGeneratorExtension;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \EmanueleMinotto\FakerBundle\Twig\FakerGeneratorExtension
 */
class FakerGeneratorExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getGlobals
     */
    public function testDisabled()
    {
        $kernel = new AppKernel('FakerGeneratorExtensionTest_testDisabled', true);
        $kernel->boot();

        $twig = $kernel->getContainer()->get('twig');
        $html = $twig->render('@FakerBundle/Tests/Resources/views/faker.html.twig');

        $this->assertRegExp('/<p><\/p>/', $html);
    }

    /**
     * @covers ::getGlobals
     */
    public function testEnabled()
    {
        $kernel = new AppKernel('FakerGeneratorExtensionTest_testEnabled', true);
        $kernel->boot();

        $twig = $kernel->getContainer()->get('twig');
        $html = $twig->render('@FakerBundle/Tests/Resources/views/faker.html.twig');

        $this->assertRegExp('/<p>\d+<\/p>/', $html);
    }

    /**
     * @covers ::getGlobals
     * @expectedException Twig_Error_Runtime
     */
    public function testDisabledTwigStrict()
    {
        $kernel = new AppKernel('FakerGeneratorExtensionTest_testDisabledTwigStrict', true);
        $kernel->boot();

        $twig = $kernel->getContainer()->get('twig');
        $twig->render('@FakerBundle/Tests/Resources/views/faker.html.twig');
    }
}
