<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\CanUseFile;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\CanLoad;
use Gaufrette\Core\Operator\CanSave;

final class FileOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $adapter instanceof CanUseFile;
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $adapter->get($file);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $adapter->save($file);

        return $this;
    }
}
