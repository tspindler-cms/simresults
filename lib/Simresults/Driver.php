<?php
namespace Simresults;

use JsonSerializable;

/**
 * The driver class.
 *
 * @author     Maurice van der Star <mauserrifle@gmail.com>
 * @copyright  (c) 2013 Maurice van der Star
 * @license    http://opensource.org/licenses/ISC
 */
class Driver implements JsonSerializable {

    /**
     * @var  string  The name of the driver
     */
    protected $name;

    /**
     * @var  boolean  Whether this driver is human or not. Defaults to true.
     */
    protected $human = true;

    /**
     * @var  string  The driver id (for example Steam ID)
     */
    protected $driver_id;



    /**
     * @var  string  Cache shorten lastname for performance improvements
     */
    protected $cache_shorten_name;


    /**
     * Set the name of the driver
     *
     * @param   string  $name
     * @return  Driver
     */
    public function setName($name)
    {
        $this->name = trim($name);
        $this->cache_shorten_name = NULL;
        return $this;
    }

    /**
     * Get the name of the driver
     *
     * @return  string
     */
    public function getName($shorten_lastname=FALSE)
    {
        $name = $this->name;

        if ($shorten_lastname)
        {
            if ($this->cache_shorten_name !== NULL)
            {
                return $this->cache_shorten_name;
            }

            $names = explode(' ', $name);
            if (count($names) > 1) {
                $last_name = array_pop($names);
                $name = $names[0]." ".$last_name[0];
            }

            $this->cache_shorten_name = $name;
        }

        return $name;
    }

    /**
     * Get the name of the driver including AI mention when it's not a human
     * driver. For example: mauserrifle (AI).
     *
     * @return  string
     */
    public function getNameWithAiMention($shorten_lastname=FALSE)
    {
        // Get driver name
        $driver_name = $this->getName($shorten_lastname);

        // Driver is not human
        if ( ! $this->isHuman())
        {
            // Mention it is a computer AI player
            $driver_name .= ' (AI)';
        }

        return $driver_name;
    }

    /**
     * Set whether the driver was human or not
     *
     * @param   boolean  $human
     * @return  Driver
     */
    public function setHuman($human)
    {
        $this->human = $human;
        return $this;
    }

    /**
     * Get whether the driver was human or not
     *
     * @return  boolean
     */
    public function isHuman()
    {
        return $this->human;
    }

    /**
     * Set the driver id (for example Steam ID)
     *
     * @param   string  $driver_id
     * @return  Driver
     */
    public function setDriverId($driver_id)
    {
        $this->driver_id = $driver_id;
        return $this;
    }

    /**
     * Get the driver id (for example Steam ID)
     *
     * @return  string
     */
    public function getDriverId()
    {
        return $this->driver_id;
    }


    /**
     * Get the json representation of the object
     *
     * @return  string
     */
    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'nameWithAImention'  => $this->getNameWithAiMention(),
            'human' => $this->isHuman(),
            'id' => $this->getDriverId()
        ];
    }

}
