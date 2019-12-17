<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 17/09/2019
 * Time: 22:38
 */

namespace App\Controller;

use App\Repository\ContinentRepository;
use App\Repository\FuseauhoraireRepository;
use App\Repository\FuseauRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="fuseau_index", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(VilleRepository $villeRepository, ContinentRepository $continentRepository, FuseauhoraireRepository $fuseauhoraireRepository):Response
    {
        $language ='fr';
        return $this->render('views/tables/datatables.html.twig',[
            'langue'=>$language,
            'fuseaux' => $fuseauhoraireRepository->findAll(),
            'continents'=>$continentRepository->findAll(),
            'villes'=>$villeRepository->findAll()

        ]);
    }

    /**
     * @param FuseauRepository $fuseauRepository
     * @return Response
     * @Annotation\Route("/en", name="fuseau_en", methods={"GET"})
     */
    public function indexEn(ContinentRepository $continentRepository,FuseauhoraireRepository $fuseauhoraireRepository):Response
    {
        $language = 'en';
        return $this->render('views/tables/datatables.html.twig',[
            'langue'=>$language,
            'fuseaux'=>$fuseauhoraireRepository->findAll(),
            'continents'=>$continentRepository->findAll()
        ]);
    }

    /**
     * @Annotation\Route("/fr", name="fuseau_fr", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexFr(ContinentRepository $continentRepository, FuseauhoraireRepository $fuseauhoraireRepository):Response
    {
        $language ='fr';
        return $this->render('views/tables/datatables.html.twig',[
            'langue'=>$language,
            'fuseaux' => $fuseauhoraireRepository->findAll(),
            'continent'=>$continentRepository->findAll()
        ]);
    }

    /**
     * @Annotation\Route("/fuseaux", name="fuseau_fr", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getFuseau(ContinentRepository $continentRepository, FuseauhoraireRepository $fuseauhoraireRepository):Response
    {
        $language ='fr';
        return $this->render('views/tables/test.html.twig',[
            'langue'=>$language,
            'fuseaux' => $fuseauhoraireRepository->findAll(),
            'continents'=>$continentRepository->findAll(),
        ]);

    }

    /**
     * @Annotation\Route("/horaire", name="fuseau_horaire", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getFuseaux(ContinentRepository $continentRepository, FuseauhoraireRepository $fuseauhoraireRepository):Response
    {
        $language ='fr';
        return $this->render('views/tables/fuseau_index.html.twig',[
            'langue'=>$language,
            'fuseaux' => $fuseauhoraireRepository->findAll(),
            'continents'=>$continentRepository->findAll(),
        ]);

    }

}