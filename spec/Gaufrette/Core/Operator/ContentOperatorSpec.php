<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsContent;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContentOperatorSpec extends ObjectBehavior
{
    function let(KnowsContent $adapter, Adapter $other, File $file)
    {
        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readContent('file.png')->willReturn('the adapter content');

        $file->getName()->willReturn('file.png');
        $file->getContent()->willReturn('the file content');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\ContentOperator');
    }

    function it_supports_content_interface(KnowsContent $adapter, File $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter(Adapter $other, File $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_content(KnowsContent $adapter, File $file)
    {
        $file->setContent('the adapter content')->shouldBeCalled();

        $this->load($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\ContentOperator');
    }

    function it_gets_content(KnowsContent $adapter, File $file)
    {
        $adapter->writeContent('file.png', 'the file content')->shouldBeCalled();

        $this->save($file, $adapter)->shouldHaveType('Gaufrette\Core\Operator\ContentOperator');
    }
}
