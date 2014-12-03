<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\File;

/**
 * This part of adapter can use an instance of Gaufrette\Core\File directly
 */
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
