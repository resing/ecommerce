Providers
========================

`Faker providers`_ can be added using services and the ``faker.provider`` tag.

Remember to add the ``faker`` service as unique argument of these services.

In this example the ``fzaninotto/company-name-generator`` will be added:

.. code-block:: yaml

    services:
        faker.test_provider:
            class: CompanyNameGenerator\FakerProvider
            public: false # useless if used alone
            arguments: ['@faker']
            tags:
            -
                name: faker.provider

after this step you can start using the new provider from the global ``faker`` service

.. code-block:: php

    public function testAction()
    {
        $faker = $this->get('faker');

        return array(
            'company_name' => $faker->companyName,
        );
    }


.. _`Faker providers`: https://github.com/fzaninotto/Faker#faker-internals-understanding-providers
