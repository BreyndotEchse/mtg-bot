<?php
namespace TgBotApi\Http\Client;

use SplFileInfo;
use TgBotApi\Model\ConversationInterface;
use TgBotApi\Model\InputFileInterface;
use TgBotApi\Model\Message;
use TgBotApi\Model\ReplyMarkupInterface;
use TgBotApi\Model\User;
use Zend\Http\Client;

class TelegramBotClient extends Client
{
    /**
     * @var array
     */
    protected $allowedActions = array(
        'typing',
        'upload_photo',
        'record_video',
        'upload_video',
        'record_audio',
        'upload_audio',
        'upload_document',
        'find_location',
    );

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $uri = 'https://api.telegram.org/bot%s/%s';

    /**
     * @var string
     */
    protected $cachedUri;

    /**
     * @param string $methodName
     * @return string
     */
    protected function getBotUri($methodName = '')
    {
        if (null === $this->cachedUri) {
            $this->cachedUri = sprintf($this->uri, $this->token, $methodName);
        }
        return $this->cachedUri;
    }

    protected function sendBotRequest($methodName, $data)
    {
        $uri = $this->getBotUri($methodName);
        $method = ('send' === substr($methodName, 0, 4) ? 'post' : 'get');
        $parameterSetter = 'setParameter' . ucfirst($method);

        $this->setUri($uri)
            ->setMethod(strtoupper($method))
            ->$parameterSetter($data);

        $response = $this->send();
    }

    public function getUpdates($offset = null, $limit = null, $timeout = null)
    {

    }

    public function setWebhook($url = null)
    {

    }

    /**
     * @return User
     */
    public function getMe()
    {

    }

    /**
     * @param ConversationInterface|integer $chat
     * @param string $text
     * @param boolean $disabledWebPagePreview
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendMessage($chat, $text, $disabledWebPagePreview = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        if ($chat instanceof ConversationInterface) {
            $chat = $chat->getId();
        }

        if ($replyToMessage instanceof Message) {
            $replyToMessage = $replyToMessage->getId();
        }
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param ConversationInterface|integer $fromChat
     * @param Message|integer $message
     * @return Message
     */
    public function forwardMessage($chat, $fromChat, $message)
    {
        if ($chat instanceof ConversationInterface) {
            $chat = $chat->getId();
        }

        if ($fromChat instanceof ConversationInterface) {
            $fromChat = $chat->getId();
        }

        if ($message instanceof Message) {
            $message = $message->getId();
        }
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param string $filetype
     * @param SplFileInfo|InputFileInterface|string $file
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    protected function sendFile($chat, $filetype, $file, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        if ($chat instanceof ConversationInterface) {
            $chat = $chat->getId();
        }

        if ($file instanceof SplFileInfo) {

        } elseif ($file instanceof InputFileInterface) {
            $file = $file->getId();
        }
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param SplFileInfo|InputFileInterface|string $photo
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendPhoto($chat, $photo, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        $this->sendFile('photo', $chat, $photo, $caption, $replyToMessage, $replyMarkup);
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param SplFileInfo|InputFileInterface|string $audio
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendAudio($chat, $audio, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        $this->sendFile('audio', $chat, $audio, $caption, $replyToMessage, $replyMarkup);
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param SplFileInfo|InputFileInterface|string $document
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendDocument($chat, $document, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        $this->sendFile('document', $chat, $document, $caption, $replyToMessage, $replyMarkup);
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param SplFileInfo|InputFileInterface|string $sticker
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendSticker($chat, $sticker, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        $this->sendFile('sticker', $chat, $sticker, $caption, $replyToMessage, $replyMarkup);
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param SplFileInfo|InputFileInterface|string $video
     * @param string $caption
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendVideo($chat, $video, $caption = null, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        $this->sendFile('video', $chat, $video, $caption, $replyToMessage, $replyMarkup);
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param float $latitude
     * @param float $longitude
     * @param Message|integer $replyToMessage
     * @param ReplyMarkupInterface $replyMarkup
     * @return Message
     */
    public function sendLocation($chat, $latitude, $longitude, $replyToMessage = null, ReplyMarkupInterface $replyMarkup = null)
    {
        if ($chat instanceof ConversationInterface) {
            $chat = $chat->getId();
        }
    }

    /**
     * @param ConversationInterface|integer $chat
     * @param string $action
     * @return boolean
     */
    public function sendChatAction($chat, $action)
    {
        if ($chat instanceof ConversationInterface) {
            $chat = $chat->getId();
        }
    }

    /**
     * @param User $user
     * @param integer $offset
     * @param integer $limit
     * @return UserProfilePhotos
     */
    public function getUserProfilePhotos($user, $offset = null, $limit = null)
    {

    }

}
