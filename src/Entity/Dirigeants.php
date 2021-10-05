<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DirigeantsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * 
 *      normalizationContext={"groups"={"dirigeants:read"}},
 *     denormalizationContext={"groups"={"dirigeants:write"}}
 * )
 * @ORM\Entity(repositoryClass=DirigeantsRepository::class)
 */
class Dirigeants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("dirigeants:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dirigeants:read", "dirigeants:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dirigeants:read", "dirigeants:write"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dirigeants:read", "dirigeants:write"})
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dirigeants:read", "dirigeants:write"})
     */
    private $mail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}
