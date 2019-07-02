<?php
namespace Simresults;

use JsonSerializable;

/**
 * The server class.
 *
 * @author     Maurice van der Star <mauserrifle@gmail.com>
 * @copyright  (c) 2013 Maurice van der Star
 * @license    http://opensource.org/licenses/ISC
 */
class Server implements JsonSerializable {

    /**
     * @var  string  The name of the server
     */
    protected $name;

    /**
     * @var  string  The message of the day used on this server
     */
    protected $motd;

    /**
     * @var  boolean  Whether this was a dedicated server or not
     */
    protected $dedicated;

    /**
     * Set the name of the server
     *
     * @param   string  $name
     * @return  Server
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name of the server
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the message of the day used on this server
     *
     * @param   string  $motd
     * @return  Server
     */
    public function setMotd($motd)
    {
        $this->motd = $motd;
        return $this;
    }

    /**
     * Get the message of the day used on this server
     *
     * @return  string
     */
    public function getMotd()
    {
        return $this->motd;
    }

    /**
     * Set whether this was a dedicated server
     *
     * @param   boolean  $dedicated
     * @return  Server
     */
    public function setDedicated($dedicated)
    {
        $this->dedicated = $dedicated;
        return $this;
    }

    /**
     * Get whether this was a dedicated server
     *
     * @return  boolean
     */
    public function isDedicated()
    {
        return $this->dedicated;
    }

    /**
     * Get the json representation of the object
     *
     * @return  array
     */
    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'motd' => $this->getMotd(),
            'dedicated' => $this->isDedicated()
        ];
    }

}
