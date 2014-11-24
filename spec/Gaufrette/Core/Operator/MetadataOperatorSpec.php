<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsMetadata;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetadataOperatorSpec extends ObjectBehavior
{
    function let(KnowsMetadata $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readMetadata('file.png')->willReturn(array('adapter' => true));

        $file->getName()->willReturn('file.png');
        $file->getMetadata()->willReturn(array('file' => true));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\MetadataOperator');
    }

    function it_supports_metadata_interface(KnowsMetadata $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_reads_metadata(KnowsMetadata $adapter, File $file)
    {
        $file->setMetadata(array('adapter' => true))->shouldBeCalled();

        $this->load($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\MetadataOperator');
    }

    function it_writes_metadata(KnowsMetadata $adapter, File $file)
    {
        $adapter->writeMetadata('file.png', array('file' => true))->shouldBeCalled();

        $this->save($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\MetadataOperator');
    }
}
