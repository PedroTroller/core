<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;
use Gaufrette\Core\FileFactory;

class Filesystem
{
    private $fileFactory;

    public function __construct(FileFactory $fileFactory)
    {
        $this->fileFactory = $fileFactory;
    }

    public function get($name)
    {
        return $this->fileFactory->createFile($name);
    }

    public function save(File $file)
    {
        return $this;
    }

    public function delete(File $file)
    {
        return $this;
    }
}
