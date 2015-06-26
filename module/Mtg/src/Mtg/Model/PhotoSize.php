<?php
namespace Mtg\Model;

class PhotoSize
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var integer
     */
    protected $width;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var integer
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return PhotoSize
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return PhotoSize
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param integer $height
     * @return PhotoSize
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return integer
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param integer $fileSize
     * @return PhotoSize
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }

}
