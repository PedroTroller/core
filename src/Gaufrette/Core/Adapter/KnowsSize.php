<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This element can get a size from a key
 */
interface KnowsSize extends Behavior
{
    /**
     * @param string $key
     *
     * @return int|string
     */
    public function readSize($key);
}
