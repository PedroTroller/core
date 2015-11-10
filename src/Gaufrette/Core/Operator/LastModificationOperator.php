<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;

final class LastModificationOperator extends AbstractOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $this->adapterHasBehavior($adapter, 'Gaufrette\Core\Adapter\KnowsLastModification');
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $time = $adapter->readLastModification($file->getName());

        if (null !== $time) {
            $file->setLastModification(\DateTime::createFromFormat('U', $time));
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $datetime = $file->getLastModification();

        if (null !== $datetime) {
            $adapter->writeLastModification($file->getName(), $datetime->format('U'));
        }

        return $this;
    }
}
