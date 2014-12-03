<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This part of adapter can get/set last access time from a key
 */
interface KnowsLastAccess extends Behavior
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
