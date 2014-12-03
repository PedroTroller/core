<?php

namespace Gaufrette\Core\Behavior;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsItsBehaviors;

class Guesser
{
    public function adapterHasBehavior(Adapter $adapter, $behavior)
    {
        if ($adapter instanceof KnowsItsBehaviors) {

            return in_array($behavior, $adapter->getBehaviors());
        }

        if (is_a($adapter, $behavior)) {

            return true;
        }

        return false;
    }

    public function allFromAdapter(Adapter $adapter)
    {
        if ($adapter instanceof KnowsItsBehaviors) {

            return $adapter->getBehaviors();
        }

        $rfl       = new \ReflectionClass($adapter);
        $behaviors = array();

        foreach ($rfl->getInterfaces() as $interface) {
            if ($interface->isSubclassOf('Gaufrette\Core\Adapter\Behavior')) {
                $behaviors[] = $interface->getName();
            }
        }

        return $behaviors;
    }
}
