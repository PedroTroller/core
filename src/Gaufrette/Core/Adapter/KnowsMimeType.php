<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This part of adapter can get a mimetype from a key
 */
interface KnowsMimeType extends Behavior
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readMimeType($key);
}
