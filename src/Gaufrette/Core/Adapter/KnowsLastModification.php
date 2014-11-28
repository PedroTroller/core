<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can get/set last modification time from a key
 *
 * @Package Gaufrette
 */
interface KnowsLastModification
{
    /**
     * @param string $key
     *
     * @return integer
     */
    public function readLastModification($key);

    /**
     * @param string $key
     * @param int $time
     *
     * @return KnowsModificationTime
     */
    public function writeLastModification($key, $time);
}
