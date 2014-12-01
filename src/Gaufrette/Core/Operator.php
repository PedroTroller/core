<?php

namespace Gaufrette\Core;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;

/**
 * Can tranfert data from adapter to file instance or reverse way
 */
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
