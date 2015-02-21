<?php
/**
 * Created by PhpStorm.
 * User: petr
 * Date: 21.2.15
 * Time: 17:25
 */

namespace Olexa\TestBundle\Navigation;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Navigation  extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Projects', array('route' => 'acme_hello_projects'))
            ->setAttribute('icon', 'icon-list');

        $menu->addChild('Employees', array('route' => 'acme_hello_employees'))
            ->setAttribute('icon', 'icon-group');

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.

        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user

        */
        $menu->addChild('User', array('label' => 'Hi visitor'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'icon-user');

        $menu['User']->addChild('Edit profile', array('route' => 'acme_hello_profile'))
            ->setAttribute('icon', 'icon-edit');

        return $menu;
    }

}

