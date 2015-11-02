<?php

namespace EmanueleMinotto\FakerBundle\Twig;

use Faker\Generator;
use Twig_Extension;

/**
 * {@inheritdoc}
 */
class FakerGeneratorExtension extends Twig_Extension
{
    /**
     * @var Generator
     */
    private $generator;

    /**
     * Sets the main Faker generator instance.
     *
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobals()
    {
        return array(
            'faker' => $this->generator,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'faker_extension';
    }
}
