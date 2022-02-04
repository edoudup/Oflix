<?php

namespace App\Controller;

use App\Entity\TvShow;
use App\Repository\TvShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tvshow", name="tvshow_")
 */
class TvShowController extends AbstractController
{
    /**
     * @Route("/", name="tv_show")
     */
    public function index(TvShowRepository $tvShowRepository): Response
    {
        return $this->render('tvshow/browse.html.twig', [
            'tvShows' => $tvShowRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="read")
     *
     * @return Response
     */
    public function read(TvShow $tvShow): Response
    {
        return $this->render('tvshow/read.html.twig', [
            'tvShow' => $tvShow
        ]);
    }
}
