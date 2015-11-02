Twig Extension
========================

This bundle provides a `Twig`_ extension that can be used to test templates with random values.

To enable it you just have to set the ``twig`` config to ``true``.


.. code-block:: yaml

    # app/config/config_dev.yml
    faker:
        twig: true


This will add a global ``faker`` object to every template so you can write things like:

.. code-block:: jinja

    <p>{{ faker.name }} and {{ faker.randomNumber|number_format }} others like this.</p>


.. _`Twig`: https://github.com/fzaninotto/Faker#faker-internals-understanding-providers
