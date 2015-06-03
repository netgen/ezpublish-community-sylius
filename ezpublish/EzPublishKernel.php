<?php
/**
 * File containing the EzPublishKernel class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

use Egulias\ListenersDebugCommandBundle\EguliasListenersDebugCommandBundle;
use eZ\Bundle\EzPublishCoreBundle\EzPublishCoreBundle;
use eZ\Bundle\EzPublishDebugBundle\EzPublishDebugBundle;
use eZ\Bundle\EzPublishIOBundle\EzPublishIOBundle;
use eZ\Bundle\EzPublishLegacyBundle\EzPublishLegacyBundle;
use eZ\Bundle\EzPublishRestBundle\EzPublishRestBundle;
use EzSystems\CommentsBundle\EzSystemsCommentsBundle;
use EzSystems\DemoBundle\EzSystemsDemoBundle;
use EzSystems\BehatBundle\EzSystemsBehatBundle;
use eZ\Bundle\EzPublishCoreBundle\Kernel;
use EzSystems\NgsymfonytoolsBundle\EzSystemsNgsymfonytoolsBundle;
use FOS\HttpCacheBundle\FOSHttpCacheBundle;
use Liip\ImagineBundle\LiipImagineBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Sensio\Bundle\DistributionBundle\SensioDistributionBundle;
use Tedivm\StashBundle\TedivmStashBundle;
use WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle;
use WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle;
use Nelmio\CorsBundle\NelmioCorsBundle;
use Hautelook\TemplatedUriBundle\HautelookTemplatedUriBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Knp\Bundle\MenuBundle\KnpMenuBundle;
use Oneup\FlysystemBundle\OneupFlysystemBundle;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;

class EzPublishKernel extends Kernel
{
    /**
     * Returns an array of bundles to registers.
     *
     * @return array An array of bundle instances.
     *
     * @api
     */
    public function registerBundles()
    {
        $bundles = array(
            // Sylius Bundles
            new \Sylius\Bundle\TranslationBundle\SyliusTranslationBundle(),
            new \Sylius\Bundle\InstallerBundle\SyliusInstallerBundle(),
            new \Sylius\Bundle\OrderBundle\SyliusOrderBundle(),
            new \Sylius\Bundle\MoneyBundle\SyliusMoneyBundle(),
            new \Sylius\Bundle\CurrencyBundle\SyliusCurrencyBundle(),
            new \Sylius\Bundle\ContactBundle\SyliusContactBundle(),
            new \Sylius\Bundle\LocaleBundle\SyliusLocaleBundle(),
            new \Sylius\Bundle\SettingsBundle\SyliusSettingsBundle(),
            new \Sylius\Bundle\CartBundle\SyliusCartBundle(),
            new \Sylius\Bundle\ProductBundle\SyliusProductBundle(),
            new \Sylius\Bundle\ArchetypeBundle\SyliusArchetypeBundle(),
            new \Sylius\Bundle\VariationBundle\SyliusVariationBundle(),
            new \Sylius\Bundle\AttributeBundle\SyliusAttributeBundle(),
            new \Sylius\Bundle\TaxationBundle\SyliusTaxationBundle(),
            new \Sylius\Bundle\ShippingBundle\SyliusShippingBundle(),
            new \Sylius\Bundle\PaymentBundle\SyliusPaymentBundle(),
            new \Sylius\Bundle\MailerBundle\SyliusMailerBundle(),
            new \Sylius\Bundle\ReportBundle\SyliusReportBundle(),
            new \Sylius\Bundle\PromotionBundle\SyliusPromotionBundle(),
            new \Sylius\Bundle\AddressingBundle\SyliusAddressingBundle(),
            new \Sylius\Bundle\InventoryBundle\SyliusInventoryBundle(),
            new \Sylius\Bundle\TaxonomyBundle\SyliusTaxonomyBundle(),
            new \Sylius\Bundle\FlowBundle\SyliusFlowBundle(),
            new \Sylius\Bundle\PricingBundle\SyliusPricingBundle(),
            new \Sylius\Bundle\SequenceBundle\SyliusSequenceBundle(),
            new \Sylius\Bundle\ContentBundle\SyliusContentBundle(),
            new \Sylius\Bundle\SearchBundle\SyliusSearchBundle(),
            new \Sylius\Bundle\RbacBundle\SyliusRbacBundle(),

            new \Sylius\Bundle\CoreBundle\SyliusCoreBundle(),
            new \Sylius\Bundle\WebBundle\SyliusWebBundle(),
            new \winzou\Bundle\StateMachineBundle\winzouStateMachineBundle(),
            new \Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
            new \Sylius\Bundle\ApiBundle\SyliusApiBundle(),

            new \Sonata\BlockBundle\SonataBlockBundle(),
            new \Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new \Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            new \Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new \Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new \Symfony\Cmf\Bundle\CreateBundle\CmfCreateBundle(),
            new \Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),

            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SwiftmailerBundle(),
            new AsseticBundle(),
            new DoctrineBundle(),
            new SensioFrameworkExtraBundle(),
            new TedivmStashBundle(),
            new HautelookTemplatedUriBundle(),
            new LiipImagineBundle(),
            new FOSHttpCacheBundle(),
            new EzPublishCoreBundle(),
            new EzPublishLegacyBundle( $this ),
            new EzPublishIOBundle(),
            new EzSystemsDemoBundle(),
            new EzPublishRestBundle(),
            new EzSystemsCommentsBundle(),
            new EzSystemsNgsymfonytoolsBundle(),
            new WhiteOctoberPagerfantaBundle(),
            new WhiteOctoberBreadcrumbsBundle(),
            new NelmioCorsBundle(),
            new KnpMenuBundle(),
            new OneupFlysystemBundle(),

            new \Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new \Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),

            new \Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
            new \FOS\OAuthServerBundle\FOSOAuthServerBundle(),
            new \FOS\RestBundle\FOSRestBundle(),

            new \FOS\UserBundle\FOSUserBundle(),
            new \FOS\ElasticaBundle\FOSElasticaBundle(),
            new \Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new \Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new \Payum\Bundle\PayumBundle\PayumBundle(),
            new \JMS\SerializerBundle\JMSSerializerBundle(),
            new \JMS\TranslationBundle\JMSTranslationBundle(),
            new \HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new \Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            new \A2lix\TranslationFormBundle\A2lixTranslationFormBundle(),

            new \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new \Sylius\Bundle\FixturesBundle\SyliusFixturesBundle(),
            new \Sylius\Bundle\PayumBundle\SyliusPayumBundle(), // must be added after PayumBundle.
        );

        switch ( $this->getEnvironment() )
        {
            case "test":
            case "behat":
                $bundles[] = new EzSystemsBehatBundle();
                // No break, test also needs dev bundles
            case "dev":
                $bundles[] = new EzPublishDebugBundle();
                $bundles[] = new WebProfilerBundle();
                $bundles[] = new SensioDistributionBundle();
                $bundles[] = new SensioGeneratorBundle();
                $bundles[] = new EguliasListenersDebugCommandBundle();
        }

        $bundles[] = new \Netgen\Bundle\EzSyliusBundle\NetgenEzSyliusBundle();

        return $bundles;
    }

    /**
     * Loads the container configuration
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     * @throws \RuntimeException when config file is not readable
     *
     * @api
     */
    public function registerContainerConfiguration( LoaderInterface $loader )
    {
        $environment = $this->getEnvironment();
        $loader->load( __DIR__ . '/config/config_' . $environment . '.yml' );
        $configFile = __DIR__ . '/config/ezpublish_' . $environment . '.yml';

        if ( !is_file( $configFile ) )
        {
            $configFile = __DIR__ . '/config/ezpublish_setup.yml';
        }

        if ( !is_readable( $configFile ) )
        {
            throw new RuntimeException( "Configuration file '$configFile' is not readable." );
        }

        $loader->load( $configFile );
    }
}
