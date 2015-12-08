<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Behavior\Guesser;
use Gaufrette\Core\Operator;

abstract class AbstractOperator implements Operator
{
    /**
     * @type Guesser
     */
    private $guesser;

    public function __construct()
    {
        $this->guesser = new Guesser();
    }

    /**
     * @param Adapter $adapter
     * @param string  $behavior
     *
     * @return bool
     */
    protected function adapterHasBehavior(Adapter $adapter, $behavior)
    {
        return $this->guesser->adapterHasBehavior($adapter, $behavior);
    }
}
