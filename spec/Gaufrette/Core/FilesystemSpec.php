<?php

namespace spec\Gaufrette\Core;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\File\FileFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FilesystemSpec extends ObjectBehavior
{
    function let(FileFactory $factory, Adapter $adapter, File $file)
    {
        $this->beConstructedWith($adapter, $factory);

        $factory->createFile('key')->willReturn($file);

        $file->getName()->willReturn('key');
        $file->setContent(Argument::any())->willReturn($file);
        $file->getContent()->willReturn('file-content');

        $adapter->read('key')->willReturn('adapter-content');
        $adapter->exists('key')->willReturn(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Filesystem');
    }

    function it_returns_a_file_by_key(File $file)
    {
        $this->get('key')->shouldReturn($file);
    }

    function it_returns_file_itself(File $file)
    {
        $this->get($file)->shouldReturn($file);
    }

    function it_sets_content_of_the_file_from_adapter(Adapter $adapter, File $file)
    {
        $adapter->read('key')->shouldBeCalled();
        $file->setContent('adapter-content')->shouldBeCalled();

        $this->get($file);
    }

    function it_saves_file_content_from_file(Adapter $adapter, File $file)
    {
        $adapter->write('key', 'file-content')->shouldBeCalled();
        $file->getContent()->shouldBeCalled();

        $this->save($file);
    }

    function it_tests_file_exists(Adapter $adapter, File $file)
    {
        $adapter->exists('key')->shouldbeCalled();

        $this->exists($file)->shouldReturn(true);
    }

    function it_tests_file_doent_exists(Adapter $adapter, File $other)
    {
        $other->getName()->willReturn('other');
        $adapter->exists('other')->willReturn(false)->shouldbeCalled();

        $this->exists($other)->shouldReturn(false);
    }

    function it_tests_key_exists(Adapter $adapter)
    {
        $adapter->exists('key')->shouldbeCalled();

        $this->exists('key')->shouldReturn(true);
    }

    function it_tests_key_doent_exists(Adapter $adapter, File $other, FileFactory $factory)
    {
        $other->getName()->willReturn('other');
        $factory->createFile('other')->willReturn($other);
        $adapter->exists('other')->willReturn(false)->shouldbeCalled();

        $this->exists('other')->shouldReturn(false);
    }
}
