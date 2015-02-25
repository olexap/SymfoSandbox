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
     * @Route("/", name="olexa_default_default")
     * @Template()
     */
    public function defaultAction()
    {

        return array();
    }

    /**
     * @Route("/projekty", name="olexa_default_projekty")
     * @Template()
     */
    public function projektyAction()
    {

        return array();
    }

    /**
     * @Route("/zamestnanci/zahradnici", name="olexa_default_zamestnanci_zahradnici")
     * @Template()
     */
    public function zahradniciAction()
    {

        return array();
    }

    /**
     * @Route("/zamestnanci/uklizecky", name="olexa_default_zamestnanci_uklizecky")
     * @Template()
     */
    public function uklizeckyAction()
    {

        return array();
    }

    /**
     * @Route("/profil", name="olexa_default_profil")
     * @Template()
     */
    public function profilAction()
    {

        return array();
    }

    /**
     * @Route("/hello/{name}", name="olexa_default_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }
}
