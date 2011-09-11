<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Message
 */
class Message
{
    /**
     * @var bigint $date
     */
    private $date;

    /**
     * @var text $number
     */
    private $number;

    /**
     * @var text $text
     */
    private $text;

    /**
     * @var  $deleted
     */
    private $deleted;

    /**
     * @var  $type
     */
    private $type;

    /**
     * @var  $new
     */
    private $new;

    /**
     * @var bigint $id
     */
    private $id;


    /**
     * Set date
     *
     * @param bigint $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return bigint 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set number
     *
     * @param text $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return text 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set deleted
     *
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Get deleted
     *
     * @return 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set type
     *
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set new
     *
     * @param $new
     */
    public function setNew($new)
    {
        $this->new = $new;
    }

    /**
     * Get new
     *
     * @return 
     */
    public function getNew()
    {
        return $this->new;
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
}