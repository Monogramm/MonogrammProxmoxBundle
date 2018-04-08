<?php

namespace spec\Monogramm\ProxmoxBundle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * MonogrammProxmoxBundle Spec.
 */
class MonogrammProxmoxBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Monogramm\ProxmoxBundle\MonogrammProxmoxBundle');
        $this->shouldImplement('Symfony\Component\HttpKernel\Bundle\BundleInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\ContainerAwareInterface');
    }
}
