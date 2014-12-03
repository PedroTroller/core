<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This part of adapter can describe it's own behaviors
 */
interface KnowsItsBehaviors extends Behavior
{
    /**
     * @return string
     */
    public function getBehaviors();
}
