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
     * @var string $number
     */
    private $number;

    /**
     * @var text $text
     */
    private $text;

    /**
     * @var string $subject
     */
    private $subject;

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
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
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
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

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
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }
}