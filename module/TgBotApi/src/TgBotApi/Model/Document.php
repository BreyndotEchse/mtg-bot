<?php
namespace TgBotApi\Model;

class Document extends AbstractFile
{
    /**
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @return PhotoSize
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return self
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return self
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

}
