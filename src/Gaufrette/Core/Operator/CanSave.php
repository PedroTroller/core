<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator;

/**
 * This operator can save data from file instance to adapter
 */
interface CanSave extends Operator
{
    /**
     * @param File $file
     * @param Adapter $adapter
     */
    public function save(File $file, Adapter $adapter);
}
