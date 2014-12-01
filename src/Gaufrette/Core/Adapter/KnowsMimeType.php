<?php

namespace Gaufrette\Core\Adapter;

/**
 * This part of adapter can get a mimetype from a key
 */
interface KnowsMimeType
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readMimeType($key);
}
