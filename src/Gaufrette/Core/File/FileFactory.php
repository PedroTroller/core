<?php

namespace Gaufrette\Core\File;

use Gaufrette\Core\File\File;
use Gaufrette\Core\File\LazyFile;
use Gaufrette\Core\Filesystem;

/**
 * Build e new file instance
 *
 * @Package Gaufrette
 */
class FileFactory
{
    /**
     * @param string $name
     *
     * @return File
     */
    public function createFile($name)
    {
        return new File($name);
    }

    /**
     * @param string $name
     * @param Filesystem $filesystem
     *
     * @return LazyFile
     */
    public function createLazyFile($name, Filesystem $filesystem)
    {
        return new LazyFile(
            $this->createFile($name),
            $filesystem
        );
    }
}
