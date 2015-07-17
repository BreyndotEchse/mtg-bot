<?php
namespace TgBotApi\Model\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
class DateTimeValueFilter implements ValueFilterInterface
{
    /**
     * @var string
     */
    public $param;

    /**
     * @param string|integer $value
     * @return string
     */
    public function filter($value)
    {
        if ((string)(integer)$value === (string)$value) {
            return '@' . $value;
        }
        return $value;
    }

    /**
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

}
