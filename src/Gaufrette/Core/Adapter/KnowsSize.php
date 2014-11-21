<?php

namespace Gaufrette\Core\Adapter;

interface KnowsSize
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readSize($key);

    /**
     * @param string $key
     * @param mixed $size
     *
     * @return KnowSize
     */
    public function writeSize($key, $size);
}
