<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Gouwradio
 */
class Gouwradio
{
    /**
     * @var integer $deleted
     */
    private $deleted;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var integer $new
     */
    private $new;

    /**
     * @var integer $read
     */
    private $read;

    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var Entities\Message
     */
    private $message;


    /**
     * Set deleted
     *
     * @param integer $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Get deleted
     *
     * @return integer 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set new
     *
     * @param integer $new
     */
    public function setNew($new)
    {
        $this->new = $new;
    }

    /**
     * Get new
     *
     * @return integer 
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set read
     *
     * @param integer $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * Get read
     *
     * @return integer 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param Entities\Message $message
     */
    public function setMessage(\Entities\Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return Entities\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }
}