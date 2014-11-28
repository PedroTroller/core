<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can retrieve a checksum from a key
 *
 * @Package Gaufrette
 */
interface KnowsChecksum
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readChecksum($key);
}
