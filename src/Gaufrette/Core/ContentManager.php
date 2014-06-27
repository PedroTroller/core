<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileFactory;
use Gaufrette\Core\Filesystem;

/**
 * Provide a direct access to file content
 */
class ContentManager
{
    /**
     * @var Filesystem $filesystem
     */
    protected $filesystem;

    /**
     * @var FileFactory $fileFactory
     */
    protected $fileFactory;

    /**
     * @param Filesystem $filesystem
     * @param FileFactory $fileFactory
     */
    public function __construct(Filesystem $filesystem, FileFactory $fileFactory)
    {
        $this->filesystem  = $filesystem;
        $this->fileFactory = $fileFactory;
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function read($key)
    {
        $file = $this
            ->filesystem
            ->get($key)
        ;

        return $file->getContent();
    }

    /**
     * @param string $key
     * @param string $content
     *
     * @return
     */
    public function write($key, $content)
    {
        $this->filesystem->save(
            $file = $this->factory->createFile($key, $content)
        );

        return $file;
    }
}
