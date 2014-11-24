<?php

namespace Gaufrette\Core\Adapter;

/**
 * This element can get/set a content from a key
 *
 * @Package Gaufrette
 */
interface KnowsContent
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readContent($key);

    /**
     * @param string $key
     * @param string $content
     *
     * @return KnowsContent
     */
    public function writeContent($key, $content);
}
