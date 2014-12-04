<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\AbstractOperator;
use Gaufrette\Core\Operator\CanLoad;
use Gaufrette\Core\Operator\CanSave;

final class ContentOperator extends AbstractOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $this->adapterHasBehavior($adapter, 'Gaufrette\Core\Adapter\KnowsContent');
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setContent($adapter->readContent($file->getName()));
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $adapter->writeContent($file->getName(), $file->getContent());
    }
}
