<?php
namespace TgBotApi\Model;

use DateTime;

class Message
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var User
     */
    protected $from;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var ConversationInterface
     */
    protected $chat;

    /**
     * @var User
     */
    protected $forwardFrom;

    /**
     * @var DateTime
     */
    protected $forwardDate;

    /**
     * @var Message
     */
    protected $replyToMessage;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var Audio
     */
    protected $audio;

    /**
     * @var Document
     */
    protected $document;

    /**
     * @var PhotoSize[]
     */
    protected $photo;

    /**
     * @var Sticker
     */
    protected $sticker;

    /**
     * @var Video
     */
    protected $video;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var User
     */
    protected $newChatParticipant;

    /**
     * @var User
     */
    protected $leftChatParticipant;

    /**
     * @var string
     */
    protected $newChatTitle;

    /**
     * @var PhotoSize[]
     */
    protected $newChatPhoto;

    /**
     * @var boolean
     */
    protected $deleteChatPhoto;

    /**
     * @var boolean
     */
    protected $groupChatCreated;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getMessageId()
    {
        return $this->id;
    }

    /**
     * @param integer $messageId
     * @return self
     */
    public function setMessageId($messageId)
    {
        $this->id = $messageId;
        return $this;
    }

    /**
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return self
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return self
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return ConversationInterface
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param ConversationInterface $chat
     * @return self
     */
    public function setChat(ConversationInterface $chat)
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return User
     */
    public function getForwardFrom()
    {
        return $this->forwardFrom;
    }

    /**
     * @param User $forwardFrom
     * @return self
     */
    public function setForwardFrom(User $forwardFrom)
    {
        $this->forwardFrom = $forwardFrom;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * @param DateTime $forwardDate
     * @return self
     */
    public function setForwardDate(DateTime $forwardDate)
    {
        $this->forwardDate = $forwardDate;
        return $this;
    }

    /**
     * @return Message
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     * @return self
     */
    public function setReplyToMessage(Message $replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Audio
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     * @return self
     */
    public function setAudio(Audio $audio)
    {
        $this->audio = $audio;
        return $this;
    }

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     * @return self
     */
    public function setDocument(Document $document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return array
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array $photo
     * @return self
     */
    public function setPhoto(array $photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return Sticker
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     * @return self
     */
    public function setSticker(Sticker $sticker)
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return self
     */
    public function setVideo(Video $video)
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return self
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return self
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return User
     */
    public function getNewChatParticipant()
    {
        return $this->newChatParticipant;
    }

    /**
     * @param User $newChatParticipant
     * @return self
     */
    public function setNewChatParticipant(User $newChatParticipant)
    {
        $this->newChatParticipant = $newChatParticipant;
        return $this;
    }

    /**
     * @return User
     */
    public function getLeftChatParticipant()
    {
        return $this->leftChatParticipant;
    }

    /**
     * @param User $leftChatParticipant
     * @return self
     */
    public function setLeftChatParticipant(User $leftChatParticipant)
    {
        $this->leftChatParticipant = $leftChatParticipant;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewChatTitle()
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     * @return self
     */
    public function setNewChatTitle($newChatTitle)
    {
        $this->newChatTitle = $newChatTitle;
        return $this;
    }

    /**
     * @return array
     */
    public function getNewChatPhoto()
    {
        return $this->newChatPhoto;
    }

    /**
     * @param array $newChatPhoto
     * @return self
     */
    public function setNewChatPhoto(array $newChatPhoto)
    {
        $this->newChatPhoto = $newChatPhoto;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDeleteChatPhoto()
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param boolean $deleteChatPhoto
     * @return self
     */
    public function setDeleteChatPhoto($deleteChatPhoto)
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getGroupChatCreated()
    {
        return $this->groupChatCreated;
    }

    /**
     * @param boolean $groupChatCreated
     * @return self
     */
    public function setGroupChatCreated($groupChatCreated)
    {
        $this->groupChatCreated = $groupChatCreated;
        return $this;
    }

}
