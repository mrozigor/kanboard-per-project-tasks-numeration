<?php

namespace Kanboard\Plugin\PerProjectTasksNumeration;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->projectAccessMap->add('PerProjectTasksNumeration', array("confirm", "addInterval"), Role::PROJECT_MEMBER);
        $this->template->hook->attach('template:task:sidebar:actions', 'PerProjectTasksNumeration:task_add_interval/add_interval_button');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'Per Project Tasks Numeration';
    }

    public function getPluginDescription()
    {
        return t('Adds project based tasks numeration which consists of project\'s identifier and incremented number.');
    }

    public function getPluginAuthor()
    {
        return 'Igor Mroz';
    }

    public function getPluginVersion()
    {
        return '0.9.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/mrozigor/kanboard-per-project-tasks-numeration';
    }
}

