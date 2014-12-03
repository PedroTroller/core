<?php

namespace Gaufrette\Core\Behavior;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsItsBehaviors;

class Guesser
{
    /**
     * Say if adapter has the given behavior
     *
     * @param Adapter $adapter
     * @param string $behavior
     *
     * @return boolean
     */
    public function adapterHasBehavior(Adapter $adapter, $behavior)
    {
        if ($adapter instanceof KnowsItsBehaviors) {

            return in_array($behavior, $adapter->getBehaviors());
        }

        return true === is_a($adapter, $behavior);
    }

    /**
     * Get all behavior of an adapter
     *
     * @param Adapter $adapter
     *
     * @return string[]
     */
    public function allFromAdapter(Adapter $adapter)
    {
        if ($adapter instanceof KnowsItsBehaviors) {

            return $adapter->getBehaviors();
        }

        $rfl       = new \ReflectionClass($adapter);
        $behaviors = array();

        foreach ($rfl->getInterfaces() as $interface) {
            if (true === $interface->isSubclassOf('Gaufrette\Core\Adapter\Behavior')) {
                $behaviors[] = $interface->getName();
            }
        }

        return $behaviors;
    }
}
