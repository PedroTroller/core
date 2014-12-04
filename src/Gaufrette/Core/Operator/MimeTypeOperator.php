<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\AbstractOperator;
use Gaufrette\Core\Operator\CanLoad;

final class MimeTypeOperator extends AbstractOperator implements CanLoad
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $this->adapterHasBehavior($adapter, 'Gaufrette\Core\Adapter\KnowsMimeType');
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setMimeType($adapter->readMimeType($file->getName()));
    }
}
