<?php

namespace Gaufrette\Core;

interface File
{
    /**
     * Clone the File withe same name and same data
     *
     * @return File
     */
    public function __clone();

    /**
     * Create a new File instance with a new name but keep original data
     *
     * @param string $name
     *
     * @return File
     */
    public function duplicate($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $content
     *
     * @return File
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getSize();

    /**
     * @param string $size
     *
     * @return File
     */
    public function setSize($size);

    /**
     * @return string
     */
    public function getChecksum();

    /**
     * @param string $checksum
     *
     * @return File
     */
    public function setChecksum($checksum);

    /**
     * @return string
     */
    public function getMimeType();

    /**
     * @param string $mimetype
     *
     * @return File
     */
    public function setMimeType($mimetype);

    /**
     * @param string|null $key
     *
     * @return string|string[]
     */
    public function getMetadata($key = null);

    /**
     * @param array<string> $metadata
     *
     * @return File
     */
    public function setMetadata(array $metadata);
}
