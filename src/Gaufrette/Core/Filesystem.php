<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;
use Gaufrette\Core\Operator;

/**
 * A filesystem abstraction
 */
interface Filesystem
{
    /**
     * @param Operator $operator
     *
     * @return Filesystem
     */
    public function addOperator(Operator $operator);

    /**
     * List files
     *
     * @param string $prefix
     *
     * @return LazyFile[]
     */
    public function getFiles($prefix = '');

    /**
     * @param File|string $file
     *
     * @return File
     */
    public function get($file);

    /**
     * @param File $file
     *
     * @return Filesystem
     */
    public function save(File $file);

    /**
     * @param File|string $file
     *
     * @return boolean
     */
    public function exists($file);

    /**
     * @param File $file
     *
     * @return Filesystem
     */
    public function delete(File $file);
}
