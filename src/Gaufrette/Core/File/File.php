<?php

namespace Gaufrette\Core\File;

use Gaufrette\Core\File as FileInterface;

/**
 * A file abstraction.
 */
final class File implements FileInterface
{
    /**
     * @type string
     */
    private $name;

    /**
     * @type string
     */
    private $content;

    /**
     * @type string
     */
    private $size;

    /**
     * @type string
     */
    private $checksum;

    /**
     * @type string
     */
    private $mimetype;

    /**
     * @type array
     */
    private $metadata;

    /**
     * @type \DateTime
     */
    private $lastAccess;

    /**
     * @type \DateTime
     */
    private $lastModification;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name     = $name;
        $this->metadata = array();
    }

    /**
     * {@inheritdoc}
     */
    public function __clone()
    {
        return $this->duplicate($this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function duplicate($name)
    {
        $clone = new self($name);
        $clone->setContent($this->content);
        $clone->setChecksum($this->checksum);
        $clone->setMetadata($this->metadata);
        $clone->setMimeType($this->mimetype);
        $clone->setSize($this->size);

        if (null !== $this->lastAccess) {
            $clone->setLastAccess($this->lastAccess);
        }

        if (null !== $this->lastModification) {
            $clone->setLastModification($this->lastModification);
        }

        return $clone;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * {@inheritdoc}
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMimeType()
    {
        return $this->mimetype;
    }

    /**
     * {@inheritdoc}
     */
    public function setMimeType($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadata($key = null)
    {
        if (null === $key) {
            return $this->metadata;
        }

        if (false === array_key_exists($key, $this->metadata)) {
            return array();
        }

        return $this->metadata[$key];
    }

    /**
     * {@inheritdoc}
     */
    public function getLastAccess()
    {
        return $this->lastAccess;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastAccess(\DateTime $lastAccess)
    {
        $this->lastAccess = $lastAccess;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastModification()
    {
        return $this->lastModification;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastModification(\DateTime $lastModification)
    {
        $this->lastModification = $lastModification;

        return $this;
    }
}
