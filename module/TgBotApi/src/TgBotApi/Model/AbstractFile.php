<?php
namespace TgBotApi\Model;

abstract class AbstractFile implements InputFileInterface
{
    /**
     * @var string
     */
    protected $id;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
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
