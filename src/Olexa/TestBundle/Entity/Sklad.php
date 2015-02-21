<?php
/**
 * Created by PhpStorm.
 * User: petr
 * Date: 21.2.15
 * Time: 15:20
 */

namespace Olexa\TestBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * Class Sklad
 * @package Olexa\TestBundle\Entity
 * @Entity
 */
class Sklad {

    /**
     *  @Column(type="integer",name="id")
     *  @Id
     *  @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $nazev;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNazev() {
        return $this->nazev;
    }

    /**
     * @param string $nazev
     */
    public function setNazev($nazev) {
        $this->nazev = $nazev;
    }



}