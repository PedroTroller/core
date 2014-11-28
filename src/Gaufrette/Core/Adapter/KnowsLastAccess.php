<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can get/set last access time from a key
 *
 * @Package Gaufrette
 */
interface KnowsLastAccess
{
    /**
     * @param string $key
     *
     * @return integer
     */
    public function readLastAccess($key);

    /**
     * @param string $key
     * @param int $time
     *
     * @return KnowsAccessTime
     */
    public function writeLastAccess($key, $time);
}
