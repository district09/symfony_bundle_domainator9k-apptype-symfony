<?php

namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity;

use DigipolisGent\Domainator9k\CoreBundle\Entity\AbstractApplication;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SymfonyTwoApplication
 * @package DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity
 *
 * @ORM\Entity()
 */
class SymfonyTwoApplication extends AbstractApplication
{

    const TYPE = "SYMFONY_TWO";

    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min="n", max="5")
     */
    protected $locale;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
     */
    protected $secret;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }
}