<?php

namespace App\Controller;

use App\Repository\TvShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request, TvShowRepository $tvShowRepository): Response
    {
        $searchStore = $request->get('search');
        $results = $tvShowRepository->findAllBySearchTerm($searchStore);

        return $this->render('search/search.html.twig', [
            'results' => $results,
            'searchStore' => $searchStore
        ]);
    }
}
