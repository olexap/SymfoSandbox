<?php

namespace Olexa\TestBundle\Controller;

use Knp\Menu\Matcher\Matcher;
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     * @Template()
     */
    public function defaultAction()
    {
        $factory = new MenuFactory();

        $menu = $factory->createItem('My menu');
        $menu->addChild('Home', array('uri' => '/'));
        $menu->addChild('Comments', array('uri' => '#comments'));
        $menu->addChild('Symfony2', array('uri' => 'http://symfony-reloaded.org/'));
        $menu->addChild('Coming soon');

        $renderer = new ListRenderer(new Matcher());

        return array('menu' => $renderer->render($menu));
    }

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }
}
