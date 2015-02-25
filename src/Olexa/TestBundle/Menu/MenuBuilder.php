<?php

namespace Olexa\TestBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Projekty', array('route' => 'olexa_default_projekty'))
            ->setAttribute('icon', 'fa fa-list');

        $zamestnanci = $menu->addChild('Zamestnanci', array())
            ->setAttribute('icon', 'fa fa-group')
            ->setAttribute('dropdown', true);
        $zamestnanci->addChild('Uklizecky', array('route' => 'olexa_default_zamestnanci_uklizecky'));
        $zamestnanci->addChild('Zahradnici', array('route' => 'olexa_default_zamestnanci_zahradnici'));

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');

        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.

        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user

        */
        $menu->addChild('User', array('label' => 'Hi visitor'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'fa fa-user');

        $menu['User']->addChild('Edit profile', array('route' => 'olexa_default_profil'))
            ->setAttribute('icon', 'fa fa-edit');

        return $menu;
    }
}
