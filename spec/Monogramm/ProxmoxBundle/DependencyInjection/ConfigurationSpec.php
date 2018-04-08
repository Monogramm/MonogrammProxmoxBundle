<?php

namespace spec\Monogramm\ProxmoxBundle\DependencyInjection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Configuration Spec.
 */
class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Monogramm\ProxmoxBundle\DependencyInjection\Configuration');
        $this->shouldImplement('Symfony\Component\Config\Definition\ConfigurationInterface');
    }

    function it_creates_config_tree_builder()
    {
        $this->getConfigTreeBuilder()->shouldHaveType('Symfony\Component\Config\Definition\Builder\TreeBuilder');
    }
}
