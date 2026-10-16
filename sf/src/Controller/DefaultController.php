<?php

namespace App\Controller;

use App\Repository\MonsterRepository;
use App\Service\PokeApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{

    public function __construct(
        private readonly MonsterRepository $monsterRepository,
        private readonly PokeApi $pokeApi
    )
    {
    }

    #[Route('/', name: 'home')]
    public function index(): Response {

        return $this->render('monsters.html.twig', [
            'monsters' => $this->monsterRepository->findAll(),
        ]);
    }

    #[Route('/monsters/{id}', name: 'monster')]
    public function list(int $id): Response {
        return $this->render('monster.html.twig', [
            'monster' => $this->monsterRepository->find($id),
        ]);

    }

    #[Route('/translate', name: 'translate')]
public function translate(): Response {
        $monsters = array_map(fn($monster) => $this->pokeApi->featchTranslation($monster) ,$this->monsterRepository->findAll()) ;

        return $this->render('index.html.twig', [
            'monsters' => json_encode($monsters),
        ]);
    }

}
