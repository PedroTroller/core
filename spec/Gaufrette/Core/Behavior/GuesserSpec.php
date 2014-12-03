<?php

namespace spec\Gaufrette\Core\Behavior;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsContent;
use Gaufrette\Core\Adapter\KnowsItsBehaviors;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuesserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Behavior\Guesser');
    }

    function it_says_if_adapter_supports_behavior(Adapter $unsupport, KnowsContent $support)
    {
        $support->implement('Gaufrette\Core\Adapter');

        $this->adapterHasBehavior($unsupport, 'Gaufrette\Core\Adapter\KnowsContent')->shouldReturn(false);
        $this->adapterHasBehavior($support, 'Gaufrette\Core\Adapter\KnowsContent')->shouldReturn(true);
    }

    function it_says_if_behevior_discriber_has_behevior(KnowsItsBehaviors $behaviors)
    {
        $behaviors->implement('Gaufrette\Core\Adapter');
        $behaviors->getBehaviors()->willReturn(array('Gaufrette\Core\Adapter\KnowsContent'));

        $this->adapterHasBehavior($behaviors, 'Gaufrette\Core\Adapter\KnowsContent')->shouldReturn(true);
    }

    function it_doesnt_support_overwritten_behaviors(KnowsItsBehaviors $behaviors)
    {
        $behaviors->implement('Gaufrette\Core\Adapter');
        $behaviors->implement('Gaufrette\Core\Adapter\KnowsContent');
        $behaviors->getBehaviors()->willReturn(array('Gaufrette\Core\Adapter\KnowsMetadata'));

        $this->adapterHasBehavior($behaviors, 'Gaufrette\Core\Adapter\KnowsMetadata')->shouldReturn(true);
        $this->adapterHasBehavior($behaviors, 'Gaufrette\Core\Adapter\KnowsContent')->shouldReturn(false);
    }

    function it_lists_behaviors(KnowsItsBehaviors $behaviors, KnowsContent $content)
    {
        $behaviors->implement('Gaufrette\Core\Adapter');
        $behaviors->implement('Gaufrette\Core\Adapter\KnowsContent');
        $behaviors->getBehaviors()->willReturn(array('Gaufrette\Core\Adapter\KnowsMetadata', 'Gaufrette\Core\Adapter\KnowsSize'));

        $content->implement('Gaufrette\Core\Adapter');

        $this->allFromAdapter($behaviors)->shouldReturn(array('Gaufrette\Core\Adapter\KnowsMetadata', 'Gaufrette\Core\Adapter\KnowsSize'));
        $this->allFromAdapter($content)->shouldReturn(array('Gaufrette\Core\Adapter\KnowsContent'));
    }
}
