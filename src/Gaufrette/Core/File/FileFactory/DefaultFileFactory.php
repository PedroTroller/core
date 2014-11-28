<?php

namespace Gaufrette\Core\File\FileFactory;

use Gaufrette\Core\File\File;
use Gaufrette\Core\File\FileFactory;

/**
 * Build a new file instance
 *
 * @Package Gaufrette
 */
final class DefaultFileFactory implements FileFactory
{
    /**
     * {@inheritdoc}
     */
    public function create($name)
    {
        return new File($name);
    }
}
