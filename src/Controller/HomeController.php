<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\TvShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(TvShowRepository $tvShowRepository, CategoryRepository $CategoryRepository): Response
    {
        $latestTvshows = $tvShowRepository->findBy([], ['id' => 'DESC'], 3);
        $allCategories = $CategoryRepository->findAll();

        //dd($latestTvshows);
        return $this->render('home/home.html.twig', [
            'latestTvshows' => $latestTvshows,
            'categories' => $allCategories
        ]);
    }
}
