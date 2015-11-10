<?php

namespace Gaufrette\Core\Adapter;

/**
 * This part of adapter can list keys of it's data (ex: name of files).
 */
interface CanListKeys extends Behavior
{
    /**
     * Lists keys beginning with pattern given
     * (no wildcard / regex matching).
     *
     * @param string $prefix
     *
     * @return array
     */
    public function listKeys($prefix = '');
}
