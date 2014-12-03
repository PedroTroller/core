<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This part of adapter can get/set last modification time from a key
 */
interface KnowsLastModification extends Behavior
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
