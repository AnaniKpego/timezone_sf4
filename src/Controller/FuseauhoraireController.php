<?php

namespace App\Controller;

use App\Entity\Fuseauhoraire;
use App\Form\FuseauhoraireType;
use App\Repository\FuseauhoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fuseauhoraire")
 */
class FuseauhoraireController extends AbstractController
{
    /**
     * @Route("/", name="fuseauhoraire_index", methods={"GET"})
     */
    public function index(FuseauhoraireRepository $fuseauhoraireRepository): Response
    {
        return $this->render('fuseauhoraire/index.html.twig', [
            'fuseauhoraires' => $fuseauhoraireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fuseauhoraire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fuseauhoraire = new Fuseauhoraire();
        $form = $this->createForm(FuseauhoraireType::class, $fuseauhoraire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fuseauhoraire);
            $entityManager->flush();

            return $this->redirectToRoute('fuseauhoraire_index');
        }

        return $this->render('fuseauhoraire/new.html.twig', [
            'fuseauhoraire' => $fuseauhoraire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fuseauhoraire_show", methods={"GET"})
     */
    public function show(Fuseauhoraire $fuseauhoraire): Response
    {
        return $this->render('fuseauhoraire/show.html.twig', [
            'fuseauhoraire' => $fuseauhoraire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fuseauhoraire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fuseauhoraire $fuseauhoraire): Response
    {
        $form = $this->createForm(FuseauhoraireType::class, $fuseauhoraire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fuseauhoraire_index');
        }

        return $this->render('fuseauhoraire/edit.html.twig', [
            'fuseauhoraire' => $fuseauhoraire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fuseauhoraire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fuseauhoraire $fuseauhoraire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fuseauhoraire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fuseauhoraire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fuseauhoraire_index');
    }
}
