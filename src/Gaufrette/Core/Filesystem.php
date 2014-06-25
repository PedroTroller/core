<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;
use Gaufrette\Core\FileFactory;

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
     * @param File $file
     *
     * @return Filesystem
     */
    public function save(File $file)
    {
        return $this;
    }

    /**
     * @param File $file
     *
     * @return Filesystem
     */
    public function delete(File $file)
    {
        return $this;
    }
}
