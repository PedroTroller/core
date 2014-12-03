<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This element can retrieve a checksum from a key
 */
interface KnowsChecksum extends Behavior
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readChecksum($key);
}
