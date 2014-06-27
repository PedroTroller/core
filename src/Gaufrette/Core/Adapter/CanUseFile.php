<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\File;

interface CanUseFile
{
    /**
     * @param File $file
     *
     * @return CanUseFile
     */
    public function save(File $file);

    /**
     * @param File $file
     *
     * @return File
     */
    public function get(File $file);
}
