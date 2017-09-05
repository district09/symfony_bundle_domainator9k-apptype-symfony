<?php

namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\ApplicationType;

use DigipolisGent\Domainator9k\CoreBundle\Entity\BaseAppType;
use DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity\SymfonyTwoSettings;
use DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Form\SymfonyTwoSettingsType;
use Digip\DeployBundle\Entity\Settings;
use Digip\DeployBundle\Entity\AppEnvironment;

class Symfony2AppType extends BaseAppType
{
    protected $settingsFormClass = SymfonyTwoSettingsType::class;
    protected $settingsEntityClass = SymfonyTwoSettings::class;

    public function getConfigFiles(AppEnvironment $env, array $servers, Settings $settings)
    {
        $user = $env->getServerSettings()->getUser();

        $dbName = $env->getDatabaseSettings()->getName();
        $dbUser = $env->getDatabaseSettings()->getUser();
        $dbPass = $env->getDatabaseSettings()->getPassword();
        $dbHost = $env->getDatabaseSettings()->getHost();
        $config = $this->getSiteConfig();
        $appFolder = $env->getApplication()->getNameForFolder();

        if ($this->getAppTypeSettingsService()->getSettings($env->getApplication(), false)) {
            $locale = $this->getAppTypeSettingsService()->getSettings($env->getApplication(), false)->getLocale();
            $secret = $this->getAppTypeSettingsService()->getSettings($env->getApplication(), false)->getSecret();
        } else {
            $locale = $env->getApplication()->getAppTypeSettings()->getLocale();
            $secret = $env->getApplication()->getAppTypeSettings()->getSecret();
        }

        $content = <<<SETTINGS
parameters:
    database_driver: pdo_mysql
    database_host: $dbHost
    database_name: $dbName
    database_user: $dbUser
    database_password: $dbPass
    database_port: null
    secret: $secret
    locale: $locale
    mailer_transport: smtp
    mailer_host: smtp.gent.be
    mailer_user: null
    mailer_password: null
$config
SETTINGS;

        $content = $env->replaceConfigPlaceholders($content, $servers);

        $files = array(
            '/dist/'.$user.'/'.$appFolder.'/config/parameters.yml' => $content,
        );

        return $files;
    }
}
