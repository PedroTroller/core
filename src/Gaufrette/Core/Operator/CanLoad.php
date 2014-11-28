<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator;

interface CanLoad extends Operator
{
    /**
     * @param File $file
     * @param Adapter $adapter
     *
     * @return Operator
     */
    public function load(File $file, Adapter $adapter);
}
