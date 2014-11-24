<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsSize;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SizeOperatorSpec extends ObjectBehavior
{
    function let(KnowsSize $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readSize('file.png')->willReturn(1234567890);

        $file->getName()->willReturn('file.png');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\SizeOperator');
    }

    function it_supports_size_interface(KnowsSize $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_size(KnowsSize $adapter, File $file)
    {
        $file->setSize(1234567890)->shouldBeCalled();

        $this->load($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\SizeOperator');
    }
}
