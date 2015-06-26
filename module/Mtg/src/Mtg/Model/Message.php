<?php
namespace Mtg\Model;

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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @return Message
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
     * @param \Mtg\Model\User $forwardFrom
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Message $replyToMessage
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Audio $audio
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Document $document
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Sticker $sticker
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Video $video
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Contact $contact
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\Location $location
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\User $newChatParticipant
     * @return \Mtg\Model\Message
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
     * @param \Mtg\Model\User $leftChatParticipant
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
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
     * @return \Mtg\Model\Message
     */
    public function setGroupChatCreated($groupChatCreated)
    {
        $this->groupChatCreated = $groupChatCreated;
        return $this;
    }

}
