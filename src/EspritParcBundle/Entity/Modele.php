<?php
/**
 * Created by PhpStorm.
 * User: Ala
 * Date: 02/12/2019
 * Time: 9:59 AM
 */

namespace EspritParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
//Pour creer un modele schema create


//pour modifier schema update force
/**
 * @ORM\Entity
 */
class Modele
{
    /**
     * @ORM\Id
     * * @ORM\GeneratedValue
     * * @ORM\Column(type="integer")
     */
private $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
private $libelle;
    /**
     * @ORM\Column(type="string",length=255)
     */
private  $pays;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }


}