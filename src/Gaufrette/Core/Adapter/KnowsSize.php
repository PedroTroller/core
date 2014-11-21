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
}
