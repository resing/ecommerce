Faker Bundle
============

[![Build Status](https://img.shields.io/travis/EmanueleMinotto/FakerBundle.svg?style=flat)](https://travis-ci.org/EmanueleMinotto/FakerBundle)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/ec8a1a0c-1895-4de6-bbab-24ce11074e83.svg?style=flat)](https://insight.sensiolabs.com/projects/ec8a1a0c-1895-4de6-bbab-24ce11074e83)
[![Coverage Status](https://img.shields.io/coveralls/EmanueleMinotto/FakerBundle.svg?style=flat)](https://coveralls.io/r/EmanueleMinotto/FakerBundle)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/EmanueleMinotto/FakerBundle.svg?style=flat)](https://scrutinizer-ci.com/g/EmanueleMinotto/FakerBundle/)
[![Total Downloads](https://img.shields.io/packagist/dt/emanueleminotto/faker-bundle.svg?style=flat)](https://packagist.org/packages/emanueleminotto/faker-bundle)

Bundle for Symfony 2 providing the [Faker](https://github.com/fzaninotto/Faker) library.

API: [emanueleminotto.github.io/FakerBundle](http://emanueleminotto.github.io/FakerBundle/)

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require --dev emanueleminotto/faker-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
        );

        if (...) {
            // ...
            $bundles[] = new EmanueleMinotto\FakerBundle\FakerBundle();
        }
    }
}
```

Usage
-----

No more requirements, you can start using the `faker` service.

Reading:

 * [Configuration Reference](https://github.com/EmanueleMinotto/FakerBundle/tree/master/Resources/doc/configuration-reference.rst)
 * [Providers](https://github.com/EmanueleMinotto/FakerBundle/tree/master/Resources/doc/providers.rst)
 * [Twig Extension](https://github.com/EmanueleMinotto/FakerBundle/tree/master/Resources/doc/twig.rst)

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE
