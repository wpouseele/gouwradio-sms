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
     * @var bigint $id
     */
    private $id;

    /**
     * @var Entities\Gouwradio
     */
    private $gouwradio;


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
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gouwradio
     *
     * @param Entities\Gouwradio $gouwradio
     */
    public function setGouwradio(\Entities\Gouwradio $gouwradio)
    {
        $this->gouwradio = $gouwradio;
    }

    /**
     * Get gouwradio
     *
     * @return Entities\Gouwradio 
     */
    public function getGouwradio()
    {
        return $this->gouwradio;
    }
}