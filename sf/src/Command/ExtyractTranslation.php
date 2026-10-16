<?php

namespace App\Command;

use App\Repository\MonsterRepository;
use App\Service\PokeApi;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('extract:translation')]
class ExtyractTranslation extends Command
{

    public function __construct(
        private readonly PokeApi $pokeApi,
        private readonly MonsterRepository $monsterRepository,
    ){
        parent::__construct();
    }

    public function __invoke(OutputInterface $output): int
    {

        $monsters = array_map(fn($monster) => $this->pokeApi->featchTranslation($monster) ,$this->monsterRepository->findAll()) ;
        $output->write(json_encode($monsters));
        return Command::SUCCESS;
    }
}
