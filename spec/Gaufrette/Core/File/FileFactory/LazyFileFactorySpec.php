<?php

namespace spec\Gaufrette\Core\File\FileFactory;

use Gaufrette\Core\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LazyFileFactorySpec extends ObjectBehavior
{
    function let(Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\File\FileFactory\LazyFileFactory');
    }

    function it_creates_file()
    {
        $return = $this->create('key');
        $return->shouldHaveType('Gaufrette\Core\File\LazyFile');
        $return->shouldHaveType('Gaufrette\Core\File');
        $return->getName()->shouldReturn('key');
    }
}
