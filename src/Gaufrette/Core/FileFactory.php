<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;

class FileFactory
{
    public function createFile($name = null, $content = null)
    {
        return (new File)
            ->setName($name)
            ->setContent($content)
        ;
    }
}
