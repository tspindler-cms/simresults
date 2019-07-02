<?php
namespace Simresults;

use JsonSerializable;

/**
 * The incident class.
 *
 * @author     Maurice van der Star <mauserrifle@gmail.com>
 * @copyright  (c) 2013 Maurice van der Star
 * @license    http://opensource.org/licenses/ISC
 */
class Incident implements JsonSerializable {

    // The incident types
    const TYPE_UNKNOWN = NULL;
    const TYPE_CAR   = 'car';
    const TYPE_ENV   = 'env';
    const TYPE_OTHER = 'other';

    /**
     * @var  string  The type based on constants. Defaults to unknown
     */
    protected $type = self::TYPE_UNKNOWN;

    /**
     * @var  string  The incident message
     */
    protected $message;

    /**
     * @var  \DateTime  The date. Mind that this does not support miliseconds.
     */
    protected $date;

    /**
     * @var  float  The elapsed time in seconds. This could be used to get
     *              a precise time including miliseconds.
     */
    protected $elapsed_seconds;

    /**
     * @var  boolean  Whether this incident is worth reviewing
     */
    protected $for_review = false;

    /**
     * The participant causing the incident
     *
     * @var  Participant|null
     */
    protected $participant;

    /**
     * The other participant (if any)
     *
     * @var  Participant|null
     */
    protected $other_participant;


    /**
     * Set the incident message
     *
     * @param   string    $message
     * @return  Incident
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the message
     *
     * @return  string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the date and time this incident happend. Mind that this does not
     * support miliseconds.
     *
     * @param   \DateTime  $date
     * @return  Incident
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the date and time this incident happend. Mind that this does not
     * support miliseconds.
     *
     * @return  \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the elapsed time in seconds. This could be used to get a precise
     * time including miliseconds.
     *
     * @param   float  $seconds
     * @return  Incident
     */
    public function setElapsedSeconds($seconds)
    {
        $this->elapsed_seconds = $seconds;
        return $this;
    }

    /**
     * Get the elapsed time in seconds. This could be used to get a precise
     * time including miliseconds.
     *
     * @return  float
     */
    public function getElapsedSeconds()
    {
        return $this->elapsed_seconds;
    }

    /**
     * Set whether this incident is worth reviewing
     *
     * @param   boolean  $for_review
     * @return  Incident
     */
    public function setForReview($for_review)
    {
        $this->for_review = $for_review;
        return $this;
    }

    /**
     * Get whether this incident is worth reviewing
     *
     * @return  boolean
     */
    public function isForReview()
    {
        return $this->for_review;
    }

    /**
     * Set the incident type based on the constants
     *
     * @param   string      $type
     * @return  Incident
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the incident type based on the constants
     *
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the participant
     *
     * @param   Participant  $participant
     * @return  Incident
     */
    public function setParticipant(Participant $participant)
    {
        $this->participant = $participant;
        return $this;
    }

    /**
     * Get the participant
     *
     * @return  Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set the other participant
     *
     * @param   Participant  $participant
     * @return  Incident
     */
    public function setOtherParticipant(Participant $participant)
    {
        $this->other_participant = $participant;
        return $this;
    }

    /**
     * Get the other participant
     *
     * @return  Participant
     */
    public function getOtherParticipant()
    {
        return $this->other_participant;
    }

    /**
     * Get the json representation of the object
     *
     * @return  array
     */
    public function jsonSerialize() {
        return [
            'message' => $this->getMessage(),
            'date' => $this->getDate(),
            'elapsedSeconds' => $this->getElapsedSeconds(),
            'forReview' => $this->isForReview(),
            'type' => $this->getType(),
            'participant' => $this->getParticipant(),
            'otherParticipant' => $this->getOtherParticipant()
        ];
    }



}
