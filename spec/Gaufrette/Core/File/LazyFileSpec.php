<?php

namespace spec\Gaufrette\Core\File;

use Gaufrette\Core\File;
use Gaufrette\Core\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LazyFileSpec extends ObjectBehavior
{
    function let(File $file, Filesystem $filesystem)
    {
        $this->beConstructedWith($file, $filesystem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\File\LazyFile');
    }

    function it_gets_data_asynchronously($file, $filesystem)
    {
        $filesystem->get($file)->shouldBeCalled();

        $this->getContent();
    }

    function it_gets_data_asynchronously_just_once($file, $filesystem)
    {
        $filesystem->get($file)->shouldBeCalledTimes(1);

        $this->getContent();
        $this->getMetadata();
    }
}
