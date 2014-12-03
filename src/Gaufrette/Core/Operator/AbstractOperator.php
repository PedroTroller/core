<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Behavior\Guesser;
use Gaufrette\Core\Operator;

abstract class AbstractOperator implements Operator
{
    private $guesser;

    public function __construct()
    {
        $this->guesser = new Guesser;
    }

    protected function adapterHasBehavior(Adapter $adapter, $behavior)
    {
        return $this->guesser->adapterHasBehavior($adapter, $behavior);
    }
}
