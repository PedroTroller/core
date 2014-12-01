<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsMimeType;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MimeTypeOperatorSpec extends ObjectBehavior
{
    function let(KnowsMimeType $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readMimeType('file.png')->willReturn('text/plain');

        $file->getName()->willReturn('file.png');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\MimeTypeOperator');
    }

    function it_supports_mimeType_interface(KnowsMimeType $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_mimeType(KnowsMimeType $adapter, File $file)
    {
        $file->setMimeType('text/plain')->shouldBeCalled();

        $this->load($file, $adapter);
    }
}
