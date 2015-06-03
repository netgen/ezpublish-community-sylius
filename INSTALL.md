# Installation instructions

## Step 1: Set up virtual host

You need to setup virtual host in which you will run eZ Publish + Sylius (eZ Sylius for future reference).
The templates for Apache 2 and nginx are provided in `doc` folder in the repo. Basically, the virtual host
should be identical to [standard eZ Publish virtual host setup](https://doc.ez.no/display/EZP/Virtual+host+setup),
but with additional rules to allow access to `web/media` and `web/assets` directories which are Sylius specific.

## Step 2: Use Composer

To install eZ Sylius, run the following commands (make sure you have an empty database ready beforehand
as it will be necessary to specify the database connection details after installing dependencies):
  
```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar create-project netgen/ezpublish-community-sylius
```

This will create the project in your current directory and run the initial Composer install.

## Step 3: Database details and parameters
  
The repo uses two files which are handled through Incenteev Parameter Handler: `parameters.yml`
and `sylius_parameters.yml` The first one, `parameters.yml`, contains basic parameters found in
any Symfony install like mailer settings, database settings, secret, fallback locale and so on,
while second one contains Sylius specific parameters: path prefix where Sylius will be ran from and
default Sylius parameters. Some of default Sylius parameters point to the original parameters from
`parameters.yml` file, and those should not be changed, while others are free to define as you wish. 

## Step 4: Install Sylius

Run the following commands from the repo root to prepare the database, assets and install Sylius:
  
```bash
php ezpublish/console doctrine:schema:create
php ezpublish/console doctrine:phpcr:repository:init
php ezpublish/console sylius:install:sample-data
php ezpublish/console sylius:install:setup
php ezpublish/console assets:install --symlink --relative
php ezpublish/console assetic:dump
php ezpublish/console cache:clear --no-warmup
```

## Step 5: Run the eZ Publish install wizard

Follow standard [eZ Publish install instructions](https://github.com/netgen/ezpublish-community-sylius/blob/sylius_integration/EZPUBLISH_INSTALL.md)
to set up folder permissions and run eZ Publish setup wizard. Make sure to select the same database
during installation wizard as specified in `parameters.yml` file.
