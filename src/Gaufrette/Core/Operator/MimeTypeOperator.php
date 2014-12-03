<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsMimeType;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\CanLoad;

final class MimeTypeOperator implements CanLoad
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $adapter instanceof KnowsMimeType;
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $file->setMimeType($adapter->readMimeType($file->getName()));
    }
}
