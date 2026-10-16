<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'monster_form')]
#[ORM\UniqueConstraint(name: 'uniq_monster_form_name', columns: ['monster_id', 'form_name'])]
#[ORM\Index(name: 'idx_monster_form_monster', columns: ['monster_id'])]
class MonsterForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Monster::class, inversedBy: 'forms')]
    #[ORM\JoinColumn(name: 'monster_id', referencedColumnName: 'dex_number', nullable: false, onDelete: 'CASCADE', foreignKeyName: 'fk_monster_form_monster', options: ['unsigned' => true])]
    private ?Monster $monster = null;

    #[ORM\Column(length: 32)]
    private string $formName;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    public array $type;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $wounds;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $brawn;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $physicalSoak;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $strain;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $brain;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $specialSoak;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $dexterity;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $defense;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $catchRate;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $eggGroup1 = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $eggGroup2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonster(): ?Monster
    {
        return $this->monster;
    }

    public function setMonster(?Monster $monster): static
    {
        $this->monster = $monster;

        return $this;
    }

    public function getFormName(): string
    {
        return $this->formName;
    }

    public function setFormName(string $formName): static
    {
        $this->formName = $formName;

        return $this;
    }

    public function getType1(): string
    {
        return $this->type1;
    }

    public function setType1(string $type1): static
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type2;
    }

    public function setType2(?string $type2): static
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getWounds(): int
    {
        return $this->wounds;
    }

    public function setWounds(int $wounds): static
    {
        $this->wounds = $wounds;

        return $this;
    }

    public function getBrawn(): int
    {
        return $this->brawn;
    }

    public function setBrawn(int $brawn): static
    {
        $this->brawn = $brawn;

        return $this;
    }

    public function getPhysicalSoak(): int
    {
        return $this->physicalSoak;
    }

    public function setPhysicalSoak(int $physicalSoak): static
    {
        $this->physicalSoak = $physicalSoak;

        return $this;
    }

    public function getStrain(): int
    {
        return $this->strain;
    }

    public function setStrain(int $strain): static
    {
        $this->strain = $strain;

        return $this;
    }

    public function getBrain(): int
    {
        return $this->brain;
    }

    public function setBrain(int $brain): static
    {
        $this->brain = $brain;

        return $this;
    }

    public function getSpecialSoak(): int
    {
        return $this->specialSoak;
    }

    public function setSpecialSoak(int $specialSoak): static
    {
        $this->specialSoak = $specialSoak;

        return $this;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): static
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getCatchRate(): int
    {
        return $this->catchRate;
    }

    public function setCatchRate(int $catchRate): static
    {
        $this->catchRate = $catchRate;

        return $this;
    }

    public function getEggGroup1(): ?string
    {
        return $this->eggGroup1;
    }

    public function setEggGroup1(?string $eggGroup1): static
    {
        $this->eggGroup1 = $eggGroup1;

        return $this;
    }

    public function getEggGroup2(): ?string
    {
        return $this->eggGroup2;
    }

    public function setEggGroup2(?string $eggGroup2): static
    {
        $this->eggGroup2 = $eggGroup2;

        return $this;
    }
}
