<?php

namespace Gaufrette\Core\Adapter;

interface CanListKeys
{
    /**
     * Lists keys beginning with pattern given
     * (no wildcard / regex matching)
     *
     * @param string $prefix
     *
     * @return array
     */
    public function listKeys($prefix = '');
}
