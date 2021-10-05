<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 * normalizationContext={"groups"={"villes:read"}},
 *   denormalizationContext={"groups"={"villes:write"}}
 */
class Ville
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("villes:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"villes:read", "vills:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

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

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
