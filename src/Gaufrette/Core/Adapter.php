<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileInterface;

/**
 * Interface for the filesystem adapters
 */
interface Adapter
{
    /**
     * Deletes the key
     *
     * @param key
     *
     * @return Adapter
     */
    public function delete($key);

    /**
     * Test if key exists
     *
     * @param string $key
     * @param string $content
     *
     * @return boolean
     */
    public function exists($key);
}
