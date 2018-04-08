<?php

namespace Monogramm\ProxmoxBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MonogrammProxmoxExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('monogramm_proxmox.hostname', $config['hostname']);
        $container->setParameter('monogramm_proxmox.username', $config['username']);
        $container->setParameter('monogramm_proxmox.password', $config['password']);
        $container->setParameter('monogramm_proxmox.realm', $config['realm']);
        $container->setParameter('monogramm_proxmox.port', $config['port']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
