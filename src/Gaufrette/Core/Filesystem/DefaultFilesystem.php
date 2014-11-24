<?php

namespace Gaufrette\Core\Filesystem;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\CanListKeys;
use Gaufrette\Core\File;
use Gaufrette\Core\File\FileFactory;
use Gaufrette\Core\Filesystem;
use Gaufrette\Core\Operator;
use Gaufrette\Core\Operator\CanLoad;
use Gaufrette\Core\Operator\CanSave;

/**
 * A filesystem abstraction
 *
 * @Package Gaufrette
 */
class DefaultFilesystem implements Filesystem
{
    /**
     * @var FileFactory $factory
     */
    private $factory;

    /**
     * @var Adapter $adapter
     */
    private $adapter;

    /**
     * @var Operator[] $operators
     */
    private $operators;

    /**
     * @param Adapter $adapter
     * @param FileFactory $factory
     *
     * @return void
     */
    public function __construct(Adapter $adapter, FileFactory $factory)
    {
        $this->adapter   = $adapter;
        $this->factory   = $factory;
        $this->operators = array();
    }

    /**
     * {@inheritdoc}
     */
    public function addOperator(Operator $operator)
    {
        $this->operators[] = $operator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles($prefix = '')
    {
        $files = array();

        if ($this->adapter instanceof CanListKeys) {
            foreach ($this->adapter->listKeys($prefix) as $key) {
                $files[$key] = $this->factory->createLazyFile($key, $this);
            }
        }

        return $files;
    }

    /**
     * {@inheritdoc}
     */
    public function get($file)
    {
        if (false === $file instanceof File) {
            $file = $this->factory->create($file);
        }

        foreach ($this->operators as $operator) {
            if (false === $operator instanceof CanLoad || false === $operator->supports($file, $this->adapter)) {

                continue;
            }

            $operator->load($file, $this->adapter);
        }

        return $file;
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file)
    {

        foreach ($this->operators as $operator) {
            if (false === $operator instanceof CanSave || false === $operator->supports($file, $this->adapter)) {

                continue;
            }

            $operator->save($file, $this->adapter);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function exists($file)
    {
        if (false === $file instanceof File) {
            $file = $this->factory->create($file);
        }

        return $this->adapter->exists($file->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function delete(File $file)
    {
        $this->adapter->delete($file);

        return $this;
    }
}
