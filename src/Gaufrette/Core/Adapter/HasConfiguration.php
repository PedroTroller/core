<?php

namespace Gaufrette\Core\Adapter;

interface HasConfiguration
{
    /**
     * Configuration can be validated using an instance of Gaufrette\Core\Adapter\Configuration
     *
     * @param array $configuration
     *
     * @return HasConfiguration
     */
    public static function createFromConfiguration(array $configuration);
}
