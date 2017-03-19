<?php


namespace MyApp\BanqueBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $CIN ;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nomprenom;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $adres;
    /**
     * @ORM\Column(type="integer")
     */
    private $Tel ;

    /**
     * @return mixed
     */
    public function getCIN()
    {
        return $this->CIN;
    }

    /**
     * @param mixed $CIN
     */
    public function setCIN($CIN)
    {
        $this->CIN = $CIN;
    }

    /**
     * @return mixed
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }

    /**
     * @param mixed $nomprenom
     */
    public function setNomprenom($nomprenom)
    {
        $this->nomprenom = $nomprenom;
    }

    /**
     * @return mixed
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * @param mixed $adres
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $Tel
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }



}