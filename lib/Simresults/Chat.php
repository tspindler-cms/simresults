<?php
namespace Simresults;

use JsonSerializable;

/**
 * The chat class.
 *
 * @author     Maurice van der Star <mauserrifle@gmail.com>
 * @copyright  (c) 2013 Maurice van der Star
 * @license    http://opensource.org/licenses/ISC
 */
class Chat implements JsonSerializable {

    /**
     * @var  string  The message sent
     */
    protected $message;

    /**
     * @var  \DateTime  The date it was sent. Mind that this does not support
     *                  miliseconds.
     */
    protected $date;

    /**
     * @var  float  The elapsed time in seconds. This could be used to get
     *              a precise time including miliseconds.
     */
    protected $elapsed_seconds;


    /**
     * Set the message sent
     *
     * @param   string  $message
     * @return  Chat
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the message sent
     *
     * @return  string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the date and time this chat was sent. Mind that this does not
     * support miliseconds.
     *
     * @param   \DateTime  $date
     * @return  Chat
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the date and time this chat was sent. Mind that this does not
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
     * @return  Chat
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
     * Get the json representation of the object
     *
     * @return  array
     */
    public function jsonSerialize() {
        return [
            'message' => $this->getMessage(),
            'date' => $this->getDate(),
            'elapsedSeconds' => $this->getElapsedSeconds()
        ];
    }

}
