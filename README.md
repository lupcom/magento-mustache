# mustache
Mustache template rendering module for Magento

# Installation

`ampersand/mustache` uses composer to handle installation of the module and its dependencies. If you're not already
using composer to install Magento modules, follow the instructions [here](https://github.com/Cotya/magento-composer-installer#install-a-module-in-your-project).

Use this command to add the module to your project

```bash
composer require ampersand/mustache:^1.0.1
```

# Usage

Documentation on Mustache templates can be found [here](http://mustache.github.io)

## Server Side Rendering

- Include the mustache block in Layout

    ```xml
    <block type="ampersand_mustache/template"
        name="mustache.block.name"
        template="path/to/template.mustache" />
    ```

- You can assign data to a block through the parent template or in Layout using a Helper.

    - From the parent template

        ```php
        $data = array();
        ...
        $this->getChild('mustache.block.name')->setTemplateData($data)->toHtml();
        ```

    - From the Layout using a helper

        ```xml
        <block type="ampersand_mustache/template"
            name="mustache.block.name"
            template="path/to/template.mustache">

            <action method="setTemplateData">
                <data helper="somehelper/getMustacheTemplateData" />
            </action>

        </block>
        ```

### Features
- Use the same block to render the same template multiple times, if you don't want the data to cascade (ie. for the array to be merged repeatedly) pass true as the third param

    ```php
    <?php foreach ($products as $product): ?>
        <?php
        echo $this->getChild('mustache.block.name')
            ->setTemplateData($product, null, true)
            ->toHtml()
        ?>
    <?php endforeach ?>
    ```

- Pass an array as data or a string value pair

    ```php
    $data = array();

    $this->getChild('mustache.block.name')
        ->setTemplateData($data)
        ->toHtml();

    $this->getChild('mustache.block.name')
        ->setTemplateData('key', 'value')
        ->toHtml();
    ```

## Client Side Rendering

- Include the mustache.js library in Layout (or in a merged and minified JS file)

    ```xml
    <action method="addJS"><name>mustache/mustache.js</name></action>
    ```

- Add the mustache block to the Layout and assign the template a unique ID. This will include a script
tag that includes the template on the page with that unique ID

    ```xml
    <block type="ampersand_mustache/script"
        name="mustache.block.name"
        template="path/to/template.mustache">

        <action method="getTemplateId">
            <id>js-unique-mustache-template-id</id>
        </action>

    </block>
    ```

- Consume the template in your javascript

    ```js
    var template = $('#js-unique-mustache-template-id').html();
    var html = Mustache.render(template, data);
    ```

Documentation on the mustache javascript library can be found [here](https://github.com/janl/mustache.js#usage)

# Contribute

Help us make this module better, submit a pull request :)

- Fork the repo
- Require `dev-default` using composer
- In `vendor/ampersand/mustache` adding your fork as another git remote repo
- Update module, test and commit changes
- Submit a pull request
