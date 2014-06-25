<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;

/**
 * Build e new file instance
 *
 * @Package Gaufrette
 */
class FileFactory
{
    /**
     * @var string $name
     * @var string $content
     *
     * @return File
     */
    public function createFile($name = null, $content = null)
    {
        return (new File)
            ->setName($name)
            ->setContent($content)
        ;
    }
}
