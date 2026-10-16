<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'biome')]
class Biome
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public int $id;

    #[ORM\Column(type: Types::TEXT)]
    public string $name;

    #[ORM\ManyToMany(targetEntity: Monster::class, mappedBy: 'biomes')]
    public Collection $monsters;
}
