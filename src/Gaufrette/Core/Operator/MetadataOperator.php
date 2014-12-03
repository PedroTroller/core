<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsMetadata;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\CanLoad;
use Gaufrette\Core\Operator\CanSave;

final class MetadataOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $adapter instanceof KnowsMetadata;
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setMetadata($adapter->readMetadata($file->getName()));
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $adapter->writeMetadata($file->getName(), $file->getMetadata());
    }
}
