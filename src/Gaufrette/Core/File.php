<?php

namespace Gaufrette\Core;

/**
 * A file abstraction
 *
 * @Package Gaufrette
 */
class File
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var string $siez
     */
    private $size;

    /**
     * @var string $checksum
     */
    private $checksum;

    /**
     * @var array $metadata
     */
    private $metadata;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return File
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $size
     *
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * @param string $checksum
     *
     * @return File
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * @param string $key
     * @param array  $content
     *
     * @return File
     */
    public function setMetadata($key, array $content)
    {
        $this->metadata[$key] = $content;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return array
     */
    public function getMetadata($key)
    {
        return array_key_exists($key, $this->metadata) ? $this->metadata[$key] : array();
    }
}
