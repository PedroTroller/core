<?php

namespace Gaufrette\Core\Adapter;

interface KnowsMimeType
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readMimeType($key);
}
