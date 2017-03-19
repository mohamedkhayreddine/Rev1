<?php


namespace MyApp\BanqueBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 */
class CompteBanquaire
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $RIB ;
    /**
     * @ORM\Column(type="integer")
     */
    private $solde ;
    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="Client",referencedColumnName="cin",onDelete="CASCADE")
     */

    private $client ;

    /**
     * @return mixed
     */
    public function getRIB()
    {
        return $this->RIB;
    }

    /**
     * @param mixed $RIB
     */
    public function setRIB($RIB)
    {
        $this->RIB = $RIB;
    }

    /**
     * @return mixed
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param mixed $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }


}