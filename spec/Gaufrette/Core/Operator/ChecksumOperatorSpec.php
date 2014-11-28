<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsChecksum;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChecksumOperatorSpec extends ObjectBehavior
{
    function let(KnowsChecksum $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readChecksum('file.png')->willReturn('thechecksum');

        $file->getName()->willReturn('file.png');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\ChecksumOperator');
    }

    function it_supports_checksum_interface(KnowsChecksum $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_content(KnowsChecksum $adapter, File $file)
    {
        $file->setChecksum('thechecksum')->shouldBeCalled();

        $this->load($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\ChecksumOperator');
    }
}
