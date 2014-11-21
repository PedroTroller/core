<?php

namespace Gaufrette\Core;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\CanListKeys;
use Gaufrette\Core\Adapter\CanUseFile;
use Gaufrette\Core\Adapter\KnowsChecksum;
use Gaufrette\Core\Adapter\KnowsMetadata;
use Gaufrette\Core\Adapter\KnowsMimeType;
use Gaufrette\Core\Adapter\KnowsSize;
use Gaufrette\Core\File;
use Gaufrette\Core\File\FileFactory;

/**
 * A filesystem abstraction
 *
 * @Package Gaufrette
 */
class Filesystem
{
    /**
     * @var FileFactory $factory
     */
    private $factory;

    /**
     * @var Adapter $adapter
     */
    private $adapter;

    /**
     * @param FileFactory $fileStat
     *
     * @return
     */
    public function __construct(Adapter $adapter, FileFactory $factory)
    {
        $this->adapter = $adapter;
        $this->factory = $factory;
    }

    public function getFiles($prefix = '')
    {
        $files = array();

        if ($this->adapter instanceof CanListKeys) {
            foreach ($this->adapter->listKeys($prefix) as $key) {
                $files[$key] = $this->factory->createLazyFile($key, $this);
            }
        }

        return $files;
    }

    /**
     * @param File|string $file
     *
     * @return File
     */
    public function get($file)
    {
        if (false === $file instanceof File) {
            $file = $this->factory->createFile($file);
        }

        if ($this->adapter instanceof CanUseFile) {

            return $this->adapter->get($file);
        }

        $file->setContent($this->adapter->read($file->getName()));

        if ($this->adapter instanceof KnowsChecksum) {
            $file->setChecksum(
                $this->adapter->readChecksum($file->getName())
            );
        }

        if ($this->adapter instanceof KnowsMetadata) {
            $file->setMetadata(
                $this->adapter->readMetadata($file->getName())
            );
        }

        if ($this->adapter instanceof KnowsMimeType) {
            $file->setMimeType(
                $this->adapter->readMimeType($file->getName())
            );
        }

        if ($this->adapter instanceof KnowsSize) {
            $file->setSize(
                $this->adapter->readSize($file->getName())
            );
        }

        return $file;
    }

    /**
     * @param File $file
     *
     * @return Filesystem
     */
    public function save(File $file)
    {
        if ($this->adapter instanceof CanUseFile) {
            $this->adapter->save($file);

            return $this;
        }

        $this->adapter->write($file->getName(), $file->getContent());

        if ($this->adapter instanceof KnowsMetadata) {
            $this->adapter->writeMetadata($file->getName(), $file->getMetadata());
        }

        if ($this->adapter instanceof KnowsMimeType) {
            $this->adapter->writeMimeType($file->getName(), $file->getMimeType());
        }

        if ($this->adapter instanceof KnowsSize) {
            $this->adapter->writeSize($file->getName(), $file->getSize());
        }

        return $this;
    }

    /**
     * @param File|string $file
     *
     * @return boolean
     */
    public function exists($file)
    {
        if (false === $file instanceof File) {
            $file = $this->factory->createFile($file);
        }

        return $this->adapter->exists($file->getName());
    }

    /**
     * @param File $file
     *
     * @return Filesystem
     */
    public function delete(File $file)
    {
        $this->adapter->delete($file);

        return $this;
    }
}
