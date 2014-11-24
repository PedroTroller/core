<?php

namespace Gaufrette\Core;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;

interface Operator
{
    /**
     * @param File $file
     * @param Adapter $adapter
     *
     * @return boolean
     */
    public function supports(File $file, Adapter $adapter);
}
