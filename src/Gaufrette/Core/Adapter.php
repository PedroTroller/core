<?php

namespace Gaufrette\Core;

/**
 * Interface a the filesystem adapters
 */
interface Adapter
{
    /**
     * Deletes the key
     *
     * @param string $key
     *
     * @return Adapter
     */
    public function delete($key);

    /**
     * Test if key exists
     *
     * @param string $key
     *
     * @return boolean
     */
    public function exists($key);
}
