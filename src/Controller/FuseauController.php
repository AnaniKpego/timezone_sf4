<?php

namespace App\Controller;

use App\Entity\Fuseau;
use App\Form\FuseauType;
use App\Repository\FuseauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fuseau")
 */
class FuseauController extends AbstractController
{
    /**
     * @Route("/", name="fuseau_index", methods={"GET"})
     */
    public function index(FuseauRepository $fuseauRepository): Response
    {

            date_default_timezone_set('Pacific/Pago_Pago');

            $data = date("D, j F Y, H:i A");
        return $this->render('views/tables/datatables.html.twig', [
            'fuseaus' => $fuseauRepository->findAll(),
            'data' => $data
        ]);
    }

    /**
     * @Route("/new", name="fuseau_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fuseau = new Fuseau();
        $form = $this->createForm(FuseauType::class, $fuseau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fuseau);
            $entityManager->flush();

            return $this->redirectToRoute('fuseau_index');
        }

        return $this->render('fuseau/new.html.twig', [
            'fuseau' => $fuseau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fuseau_show", methods={"GET"})
     */
    public function show(Fuseau $fuseau): Response
    {

        return $this->render('fuseau/show.html.twig', [
            'fuseau' => $fuseau,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="fuseau_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fuseau $fuseau): Response
    {
        $form = $this->createForm(FuseauType::class, $fuseau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fuseau_index');
        }

        return $this->render('fuseau/edit.html.twig', [
            'fuseau' => $fuseau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fuseau_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fuseau $fuseau): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fuseau->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fuseau);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fuseau_index');
    }
}
