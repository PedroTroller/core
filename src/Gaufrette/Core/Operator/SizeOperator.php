<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsSize;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\CanLoad;

final class SizeOperator implements CanLoad
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $adapter instanceof KnowsSize;
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setSize($adapter->readSize($file->getName()));

        return $this;
    }
}
