<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator;

/**
 * This operator can load data from adapter to file instance
 */
interface CanLoad extends Operator
{
    /**
     * @param File $file
     * @param Adapter $adapter
     */
    public function load(File $file, Adapter $adapter);
}
