<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can list keys of it's data (ex: name of files)
 *
 * @Package Gaufrette
 */
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
