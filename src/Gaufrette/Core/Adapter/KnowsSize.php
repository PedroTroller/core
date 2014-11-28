<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can get a size from a key
 *
 * @Package Gaufrette
 */
interface KnowsSize
{
    /**
     * @param string $key
     *
     * @return int|string
     */
    public function readSize($key);
}
