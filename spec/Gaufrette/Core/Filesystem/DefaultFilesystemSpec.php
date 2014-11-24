<?php

namespace spec\Gaufrette\Core\Filesystem;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\File\FileFactory;
use Gaufrette\Core\Operator\CanLoad;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultFilesystemSpec extends ObjectBehavior
{
    function let(FileFactory $factory, Adapter $adapter, CanLoad $operator, File $file, File $other)
    {
        $factory->create('key')->willReturn($file);

        $file->getName()->willReturn('key');
        $file->setContent(Argument::any())->willReturn($file);
        $file->getContent()->willReturn('file-content');

        $adapter->exists('key')->willReturn(true);

        $operator->implement('Gaufrette\Core\Operator\CanSave');
        $operator->supports($file, $adapter)->willReturn(true);
        $operator->load($file, $adapter)->willReturn('adapter-content');

        $this->beConstructedWith($adapter, $factory);
        $this->addOperator($operator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Filesystem\DefaultFilesystem');
    }

    function it_returns_a_file_by_key($file)
    {
        $this->get('key')->shouldReturn($file);
    }

    function it_returns_file_itself($file)
    {
        $this->get($file)->shouldReturn($file);
    }

    function it_sets_content_of_the_file_from_adapter($operator, $adapter, $file)
    {
        $operator->load($file, $adapter)->shouldBeCalled();

        $this->get($file);
    }

    function it_saves_file_content_from_file($operator, $adapter, $file)
    {
        $operator->save($file, $adapter)->shouldBeCalled();

        $this->save($file);
    }

    function it_tests_file_exists($adapter, $file)
    {
        $adapter->exists('key')->shouldbeCalled();

        $this->exists($file)->shouldReturn(true);
    }

    function it_tests_file_doent_exists($adapter, $other)
    {
        $other->getName()->willReturn('other');
        $adapter->exists('other')->willReturn(false)->shouldbeCalled();

        $this->exists($other)->shouldReturn(false);
    }

    function it_tests_key_exists($adapter)
    {
        $adapter->exists('key')->shouldbeCalled();

        $this->exists('key')->shouldReturn(true);
    }

    function it_tests_key_doent_exists($adapter, $other, $factory)
    {
        $other->getName()->willReturn('other');
        $factory->create('other')->willReturn($other);
        $adapter->exists('other')->willReturn(false)->shouldbeCalled();

        $this->exists('other')->shouldReturn(false);
    }
}
