<?php

namespace Gaufrette\Core\File;

/**
 * Build a new file instance
 *
 * @Package Gaufrette
 */
interface FileFactory
{
    /**
     * @param string $name
     *
     * @return Gaufrette\Core\File
     */
    public function create($name);
}
