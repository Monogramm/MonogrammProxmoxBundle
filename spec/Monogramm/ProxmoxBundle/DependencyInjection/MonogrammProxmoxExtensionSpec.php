<?php

namespace spec\Monogramm\ProxmoxBundle\DependencyInjection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * MonogrammProxmoxExtension Spec.
 */
class MonogrammProxmoxExtensionSpec extends ObjectBehavior
{
    const HOSTNAME = 'proxmox.company.com';
    const USERNAME = 'root';
    const PASSWORD = 'mysupersecretpassword';
    const REALM = 'pam';
    const PORT = '8006';

    function it_is_initializable()
    {
        $this->shouldHaveType('Monogramm\ProxmoxBundle\DependencyInjection\MonogrammProxmoxExtension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ExtensionInterface');
    }

    function it_loads(ContainerBuilder $container)
    {
        $container->setParameter('monogramm_proxmox.hostname', self::HOSTNAME)->shouldBeCalled();
        $container->setParameter('monogramm_proxmox.username', self::USERNAME)->shouldBeCalled();
        $container->setParameter('monogramm_proxmox.password', self::PASSWORD)->shouldBeCalled();
        $container->setParameter('monogramm_proxmox.realm', self::REALM)->shouldBeCalled();
        $container->setParameter('monogramm_proxmox.port', self::PORT)->shouldBeCalled();
        $container->hasExtension('http://symfony.com/schema/dic/services')->shouldBeCalled();
        $container->addResource(Argument::type('Symfony\Component\Config\Resource\FileResource'))->shouldBeCalled();
        $container->setDefinition('monogramm_proxmox.api', Argument::type('Symfony\Component\DependencyInjection\Definition'))->shouldBeCalled();
        $container->setAlias('proxmox', Argument::type('Symfony\Component\DependencyInjection\Alias'))->shouldBeCalled();
        $configs = array(
            array(
                'hostname' => self::HOSTNAME,
                'username' => self::USERNAME,
                'password' => self::PASSWORD,
                'realm' => self::REALM,
                'port' => self::PORT,
            )
        );
        $this->load($configs, $container);
    }
}
