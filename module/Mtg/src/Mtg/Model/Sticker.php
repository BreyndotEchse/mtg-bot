<?php
namespace Mtg\Model;

class Sticker extends AbstractFile
{
    /**
     * @var integer
     */
    protected $width;

    /**
     * @var integer
     */
    protected $height;

    /**
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return Sticker
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
     * @return Sticker
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

        /**
     * @return PhotoSize
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return Sticker
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
        return $this;
    }

}
