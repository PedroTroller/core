<?php

namespace Gaufrette\Core;

/**
 * Can tranfert data from adapter to file instance or reverse way.
 */
interface Operator
{
    /**
     * @param File    $file
     * @param Adapter $adapter
     *
     * @return bool
     */
    public function supports(File $file, Adapter $adapter);
}
