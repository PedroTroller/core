<?php

namespace Gaufrette\Core\File;

use Gaufrette\Core\File as FileInterface;
use Gaufrette\Core\Filesystem;

/**
 * Build a new file instance with lazy loading.
 */
final class LazyFile implements FileInterface
{
    /**
     * @var FileInterface
     */
    private $file;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var bool
     */
    private $hydrated;

    /**
     * @param FileInterface $file
     * @param Filesystem    $filesystem
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
    public function getContent()
    {
        $this->hydrate();

        return $this->file->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->hydrate();
        $this->file->setContent($content);

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
    public function setSize($size)
    {
        $this->hydrate();
        $this->file->setSize($size);

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
    public function setChecksum($checksum)
    {
        $this->hydrate();
        $this->file->setChecksum($checksum);

        return $this;
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
        $this->hydrate();
        $this->file->setMimeType($mimetype);

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
     * {@inheritdoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->hydrate();
        $this->file->setMetadata($metadata);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastAccess()
    {
        $this->hydrate();

        return $this->file->getLastAccess();
    }

    /**
     * {@inheritdoc}
     */
    public function setLastAccess(\DateTime $lastAccess)
    {
        $this->hydrate();
        $this->file->setLastAccess($lastAccess);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastModification()
    {
        $this->hydrate();

        return $this->file->getLastModification();
    }

    /**
     * {@inheritdoc}
     */
    public function setLastModification(\DateTime $lastModification)
    {
        $this->hydrate();
        $this->file->setLastModification($lastModification);

        return $this;
    }

    /**
     * Get the file from the filesystem. Skip if only hydrated.
     *
     * @return
     */
    private function hydrate()
    {
        if (true === $this->hydrated) {
            return;
        }

        $this->filesystem->get($this->file);
        $this->hydrated = true;
    }
}
