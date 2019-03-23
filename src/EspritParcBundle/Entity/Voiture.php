<?php
/**
 * Created by PhpStorm.
 * User: Ala
 * Date: 02/20/2019
 * Time: 9:32 AM
 */

namespace EspritParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Voiture
{
    /**
     * @ORM\Id
     * * @ORM\GeneratedValue
     * * @ORM\Column(type="integer")
     */
    private $ref;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $serie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateMiseCirculation",type="date")
     */
    private $DateMiseCirculationtype;

    //Jointure entre voiture et table modele la colonne modele fait reference a la colonne id dans la table modele
    /**
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumn(name="modele_id",referencedColumnName="id")
     */
    private $modele;




    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return \DateTime
     */
    public function getDateMiseCirculationtype()
    {
        return $this->DateMiseCirculationtype;
    }

    /**
     * @param \DateTime $DateMiseCirculationtype
     */
    public function setDateMiseCirculationtype($DateMiseCirculationtype)
    {
        $this->DateMiseCirculationtype = $DateMiseCirculationtype;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }







}