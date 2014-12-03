<?php

namespace Gaufrette\Core\Adapter;

/**
 * This part of adapter can retrieve a checksum from a key
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
