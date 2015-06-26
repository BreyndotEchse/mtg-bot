<?php
namespace Mtg\Model;

class Video extends AbstractFile
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
     * @var integer
     */
    protected $duration;

    /**
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * @var string
     */
    protected $caption;

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return Video
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
     * @return Video
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param integer $duration
     * @return Audio
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * @return Video
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return Video
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

}
