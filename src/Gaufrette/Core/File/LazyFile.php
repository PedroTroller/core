<?php

namespace Gaufrette\Core\File;

use Gaufrette\Core\File as FileInterface;
use Gaufrette\Core\Filesystem;

/**
 * Build a new file instance with lazy loading
 *
 * @Package Gaufrette
 */
final class LazyFile implements FileInterface
{
    /**
     * @var FileInterface $file
     */
    private $file;

    /**
     * @var Filesystem $filesystem
     */
    private $filesystem;

    /**
     * @var boolean $hydrated
     */
    private $hydrated;

    /**
     * @param FileInterface $file
     * @param Filesystem $filesystem
     *
     * @return void
     */
    public function __construct(FileInterface $file, Filesystem $filesystem)
    {
        $this->file       = $file;
        $this->filesystem = $filesystem;
        $this->hydrated   = false;
    }

    /**
     * {@inheritdoc}
     */
    public function __clone()
    {
        return $this->duplicate($this->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function duplicate($name)
    {
        $this->hydrate();

        return $this->file->duplicate($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->file->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->file->setContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        $this->hydrate();

        return $this->file->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size)
    {
        $this->file->setSize($size);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        $this->hydrate();

        return $this->file->getSize();
    }

    /**
     * {@inheritdoc}
     */
    public function setChecksum($checksum)
    {
        $this->file->setChecksum($checksum);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChecksum()
    {
        $this->hydrate();

        return $this->file->getChecksum();
    }

    /**
     * {@inheritdoc}
     */
    public function getMimeType()
    {
        $this->hydrate();

        return $this->file->getMimeType();
    }

    /**
     * {@inheritdoc}
     */
    public function setMimeType($mimetype)
    {
        $this->file->setMimeType($mimetype);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->file->setMetadata($metadata);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadata($key = null)
    {
        $this->hydrate();

        return $this->file->getMetadata($key);
    }

    /**
     * Get the file from the filesystem. Skip if only hydrated.
     *
     * @return void
     */
    protected function hydrate()
    {
        if (true === $this->hydrated) {

            return;
        }

        $this->filesystem->get($this->file);
        $this->hydrated = true;
    }
}
