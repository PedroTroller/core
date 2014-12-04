<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Behavior\Guesser;
use Gaufrette\Core\Operator;

abstract class AbstractOperator implements Operator
{
    /**
     * @var Guesser $guesser
     */
    private $guesser;

    public function __construct()
    {
        $this->guesser = new Guesser;
    }

    /**
     * @param Adapter $adapter
     * @param string $behavior
     *
     * @return boolean
     */
    protected function adapterHasBehavior(Adapter $adapter, $behavior)
    {
        return $this->guesser->adapterHasBehavior($adapter, $behavior);
    }
}