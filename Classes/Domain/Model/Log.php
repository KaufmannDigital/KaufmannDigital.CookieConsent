<?php
namespace KaufmannDigital\CookieConsent\Domain\Model;

/*
 * This file is part of the KaufmannDigital.CookieConsent package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Log
{

    /**
     * @var \DateTime
     * @Flow\Validate(type="DateTime")
     */
    protected $date;

    /**
     * @var \DateTime
     * @Flow\Validate(type="DateTime")
     */
    protected $cookieExpiry;

    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $choice;


    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @return \DateTime
     */
    public function getCookieExpiry()
    {
        return $this->cookieExpiry;
    }

    /**
     * @param \DateTime $cookieExpiry
     * @return void
     */
    public function setCookieExpiry($cookieExpiry)
    {
        $this->cookieExpiry = $cookieExpiry;
    }
    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return void
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }
    /**
     * @return string
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * @param string $choice
     * @return void
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;
    }
}
