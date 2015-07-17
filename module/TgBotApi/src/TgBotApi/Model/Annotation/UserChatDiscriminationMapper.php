<?php
namespace TgBotApi\Model\Annotation;

use TgBotApi\Model\Annotation\Exception;

/**
 * @Annotation
 * @Target("METHOD")
 */
class UserChatDiscriminationMapper implements InterfaceDiscriminationMapperInterface
{
    /**
     * @var string
     */
    public $param;

    /**
     * @param array $data
     * @return string
     * @throws Exception\AnnotationException
     */
    public function getClass($data)
    {
        if (!empty($data['first_name']) || !empty($data['last_name']) || !empty($data['username'])) {
            return '\TgBotApi\Model\User';
        } elseif (!empty($data['title'])) {
            return '\TgBotApi\Model\GroupChat';
        }
        throw new Exception\AnnotationException(sprintf('Cannot determine model class by $data in %s::%s', __CLASS__, __METHOD__));
    }

    /**
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }
}
