<?php

namespace spec\Gaufrette\Core\File\FileFactory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultFileFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\File\FileFactory\DefaultFileFactory');
    }

    function it_creates_file()
    {
        $return = $this->create('key');
        $return->shouldHaveType('Gaufrette\Core\File\File');
        $return->shouldHaveType('Gaufrette\Core\File');
        $return->getName()->shouldReturn('key');
    }
}
