<?php

namespace Gaufrette\Core\Adapter;

interface KnowsMetadata
{
    /**
     * @param string $key
     *
     * @return array
     */
    public function readMetadata($key);

    /**
     * @param string $key
     * @param array $metadata
     *
     * @return KnowsMetadata
     */
    public function writeMetadata($key, array $metadata);
}
