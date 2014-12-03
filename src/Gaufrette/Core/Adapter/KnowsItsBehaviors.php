<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

interface KnowsItsBehaviors extends Behavior
{
    public function getBehaviors();
}
