<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This part of adapter can get/set metadata from a key
 */
interface KnowsMetadata extends Behavior
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
