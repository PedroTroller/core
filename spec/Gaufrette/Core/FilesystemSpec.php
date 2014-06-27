<?php

namespace spec\Gaufrette\Core;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Gaufrette\Core\FileFactory;

class FilesystemSpec extends ObjectBehavior
{
    function let(FileFactory $fileFactory)
    {
        $this->beConstructedWith($fileFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Filesystem');
    }
}
