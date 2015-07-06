<?php
namespace TgBotApi\Model;

class Audio extends AbstractFile
{
    /**
     * @var integer
     */
    protected $duration;

    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param integer $duration
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

}
