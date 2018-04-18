<?php

namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity;

use DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Form\Type\SymfonyTwoApplicationFormType;
use DigipolisGent\Domainator9k\CoreBundle\Entity\AbstractApplication;
use DigipolisGent\Domainator9k\CoreBundle\Entity\TemplateInterface;
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

    /**
     * @return string
     */
    public static function getApplicationType() :string
    {
        return self::TYPE;
    }

    /**
     * @return string
     */
    public static function getFormType(): string
    {
        return SymfonyTwoApplicationFormType::class;
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

    /**
     * @return array
     */
    public static function getTemplateReplacements(): array
    {
        $templateReplacements = parent::getTemplateReplacements();
        $templateReplacements['locale()'] = 'getLocale()';
        $templateReplacements['secret()'] = 'getSecret()';

        return $templateReplacements;
    }
}
