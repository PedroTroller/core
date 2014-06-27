<?php

namespace Gaufrette\Core\Adapter;

interface KnowsChecksum
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readChecksum($key);
}
