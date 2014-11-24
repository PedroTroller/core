<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsChecksum;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\CanLoad;

final class ChecksumOperator implements CanLoad
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $adapter instanceof KnowsChecksum;
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setChecksum($adapter->readChecksum($file->getName()));

        return $this;
    }
}
