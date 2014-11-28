<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can get a mimetype from a key
 *
 * @Package Gaufrette
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
