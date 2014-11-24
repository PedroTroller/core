<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\File;

/**
 * This element can use an instance of Gaufrette\Core\File directly
 *
 * @Package Gaufrette
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
