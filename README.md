# NOTE: Deprecated repo

This repo is deprecated in favor of https://github.com/netgen/ezplatform-sylius due to being based on now unsupported and pretty old version of eZ Publish. The new repo is based on current version of eZ Platform.

# eZ Publish 5 and Sylius E-Commerce integration

## About this repo

This repo provides an example integration of eZ Publish 5 and Sylius E-Commerce.

Initial version of integration provides the ability to run eZ Publish and Sylius
as one application, using the same database, but WITHOUT sharing users. Sharing users between
eZ Publish and Sylius is planned for further releases.

Two integration points do exist however (provided by [NetgenEzSyliusBundle](https://github.com/netgen/NetgenEzSyliusBundle)):

* eZ Publish field type and legacy datatype which provide the ability to create and edit Sylius
  products by publishing eZ Publish content
* Ability to generate links to eZ Publish content wrapping Sylius products instead of generating
  the links to products themselves

## Installation instructions

For installation instructions, see [INSTALL.md](https://github.com/netgen/ezpublish-community-sylius/blob/sylius_integration/INSTALL.md).

## Requirements

eZ Publish 5 and Sylius have the same requirements as [Symfony2](http://symfony.com/doc/master/reference/requirements.html),
plus the [regular eZ Publish 4 ones](http://doc.ez.no/eZ-Publish/Technical-manual/4.x/Installation/Normal-installation/Requirements-for-doing-a-normal-installation).

Minimum PHP version is 5.4.4, but 5.5.x is recommended.

The integration is based on eZ Publish Community 2014.11 and Sylius E-Commerce 0.14

## Known issues

Two issues were detected while testing the integration and as of now remain unfixed. However, both issues
are not critical and can be easily circumvented and do not affect normal operation:

* running `cache:clear` command WITHOUT `--no-warmup` flag results in `RuntimeException` "Failed to start the
  session because headers have already been sent by `/var/www/html/ezpublish/ezpublish_legacy/lib/ezutils/classes/ezcli.php`
  at line 351."
  
  Solution: Run the command with `--no-warmup` flag

* running eZ Publish setup wizard in dev environment (set by `ENVIRONMENT` environment variable), results
  in fatal error at the end of setup wizard.

  Solution: Run the setup wizard while in prod environment

## Credits

The following people worked on integrating eZ Publish and Sylius:

* [Antonio Perić](https://github.com/antonioperic) (Locastic)
* [Ivan Herak](https://github.com/iherak) (Netgen)
* [Edi Modrić](https://github.com/emodric) (Netgen)

This integration was developed on a commercial project in cooperation with [Locastic](https://github.com/locastic) (development)
and [Keyteq](https://github.com/keyteqlabs) (project lead).

## Copyright

* Copyright (C) 1999-2015 eZ Systems AS. All rights reserved.
* Copyright (c) 2011-2015 Paweł Jędrzejewski
* Copyright (C) 2015 Locastic. All rights reserved.
* Copyright (C) 2015 Netgen. All rights reserved.

## License

* http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
* https://github.com/Sylius/Sylius/blob/master/LICENSE
