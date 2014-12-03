<?php

namespace Gaufrette\Core\Adapter;

/**
 * This part of adapter can get a size from a key
 */
interface KnowsSize
{
    /**
     * @param string $key
     *
     * @return int
     */
    public function readSize($key);
}
