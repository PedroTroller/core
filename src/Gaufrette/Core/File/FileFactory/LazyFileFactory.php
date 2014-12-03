<?php

namespace Gaufrette\Core\File\FileFactory;

use Gaufrette\Core\File\File;
use Gaufrette\Core\File\FileFactory;
use Gaufrette\Core\File\LazyFile;
use Gaufrette\Core\Filesystem;

/**
 * Build a new lazy file instance
 */
final class LazyFileFactory implements FileFactory
{
    /**
     * @var Filesystem $filesystem
     */
    private $filesystem;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function create($name)
    {
        return new LazyFile(
            new File($name),
            $this->filesystem
        );
    }
}
