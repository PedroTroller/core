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

    /**
     * @param string $key
     * @param string $mime
     *
     * @return KnowMimeType
     */
    public function writeMimeType($key, $mime);
}
