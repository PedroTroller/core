<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\CanUseFile;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileOperatorSpec extends ObjectBehavior
{
    function let(CanUseFile $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');

        $file->getName()->willReturn('file.png');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\FileOperator');
    }

    function it_supports_file_interface(CanUseFile $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_file(CanUseFile $adapter, File $file)
    {
        $adapter->get($file)->shouldBeCalled();

        $this->load($file, $adapter);
    }

    function it_gets_file(CanUseFile $adapter, File $file)
    {
        $adapter->save($file)->shouldBeCalled();

        $this->save($file, $adapter);
    }
}
