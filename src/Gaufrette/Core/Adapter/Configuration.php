<?php

namespace Gaufrette\Core\Adapter;

interface Configuration
{
    /**
     * @return array
     */
    public function getRequiredOptions();

    /**
     * @return array
     */
    public function getOptionalOptions();
}
