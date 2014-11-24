<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator;

interface CanSave extends Operator
{
    /**
     * @param File $file
     * @param Adapter $adapter
     *
     * @return Operator
     */
    public function save(File $file, Adapter $adapter);
}
