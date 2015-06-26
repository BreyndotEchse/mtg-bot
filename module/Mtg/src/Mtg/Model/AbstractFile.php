<?php
namespace Mtg\Model;

abstract class AbstractFile
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var string
     */
    protected $mineType;

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
     * @return self
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMineType()
    {
        return $this->mineType;
    }

    /**
     * @param string $mineType
     * @return self
     */
    public function setMineType($mineType)
    {
        $this->mineType = $mineType;
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
     * @return self
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}
