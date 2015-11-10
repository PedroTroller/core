<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;

final class LastAccessOperator extends AbstractOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $this->adapterHasBehavior($adapter, 'Gaufrette\Core\Adapter\KnowsLastAccess');
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $time = $adapter->readLastAccess($file->getName());

        if (null !== $time) {
            $file->setLastAccess(\DateTime::createFromFormat('U', (string) $time));
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $datetime = $file->getLastAccess();

        if (null !== $datetime) {
            $adapter->writeLastAccess($file->getName(), $datetime->format('U'));
        }

        return $this;
    }
}
