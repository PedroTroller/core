<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileFactory;
use Gaufrette\Core\FileInterface;

/**
 * A filesystem abstraction
 *
 * @Package Gaufrette
 */
class Filesystem
{
    /**
     * @var FileFactory $fileFactory
     */
    private $fileFactory;

    /**
     * @param FileFactory $fileStat
     *
     * @return
     */
    public function __construct(FileFactory $fileFactory)
    {
        $this->fileFactory = $fileFactory;
    }

    public function createStream($key)
    {
        return $this->adapter->createStream($key);
    }

    /**
     * @param string $name
     *
     * @return File
     */
    public function get($name)
    {
        return $this->fileFactory->createFile($name);
    }

    /**
     * @param FileInterface $file
     *
     * @return Filesystem
     */
    public function save(FileInterface $file)
    {
        return $this;
    }

    /**
     * @param FileInterface $file
     *
     * @return Filesystem
     */
    public function delete(FileInterface $file)
    {
        return $this;
    }
}
