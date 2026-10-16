<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'monster')]
#[ORM\UniqueConstraint(name: 'uniq_monster_dex_number', columns: ['dex_number'])]
#[ORM\UniqueConstraint(name: 'uniq_monster_name', columns: ['name'])]
class Monster
{

    #[ORM\Id]
    #[ORM\Column(type: Types::SMALLINT, options: ['unsigned' => true])]
    public int $dexNumber;

    #[ORM\Column(length: 64)]
    public string $name;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    public array $type;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $wounds;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $brawn;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $physicalSoak;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $strain;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $brain;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $specialSoak;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $dexterity;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $defense;

    #[ORM\Column(type: Types::SMALLINT)]
    public int $catchRate;

    #[ORM\Column(length: 32, nullable: true)]
    public ?string $eggGroup1 = null;

    #[ORM\Column(length: 32, nullable: true)]
    public ?string $eggGroup2 = null;

    /**
     * @var Collection<int, MonsterForm>
     */
    #[ORM\OneToMany(targetEntity: MonsterForm::class, mappedBy: 'monster', cascade: ['persist', 'remove'], orphanRemoval: true)]
    public Collection $forms;

    #[ORM\ManyToMany(targetEntity: Biome::class, inversedBy: 'monsters')]
    #[ORM\JoinTable(
        name: "biome_monster",
        joinColumns: new ORM\JoinColumn(name: "monster_id", referencedColumnName: 'dex_number'),
        inverseJoinColumns: new ORM\JoinColumn(name: "biome_id", referencedColumnName: 'id'),
    )]
    public Collection $biomes;

    public function __construct()
    {
        $this->forms = new ArrayCollection();
    }

    public function addForm(MonsterForm $form): static
    {
        if (!$this->forms->contains($form)) {
            $this->forms->add($form);
            $form->setMonster($this);
        }

        return $this;
    }

    public function removeForm(MonsterForm $form): static
    {
        if ($this->forms->removeElement($form)) {
            if ($form->getMonster() === $this) {
                $form->setMonster(null);
            }
        }

        return $this;
    }
}
