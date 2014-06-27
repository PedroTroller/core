<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileInterface;

/**
 * Interface for the filesystem adapters
 */
interface Adapter
{
    /**
     * Reads the content from key
     *
     * @param string $key
     *
     * @return string
     */
    public function read($key);

    /**
     * Writes the given content at the given key
     *
     * @param string $key
     * @param string $content
     *
     * @return Adapter
     */
    public function write($key, $content);

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
