<?php

namespace App\Controller;

use App\Entity\BatimentMalekBouderbela;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/batiment_malek_bouderbela')]
class BatimentMalekBouderbelaCController extends AbstractController
{
    // ✅ Afficher tous les bâtiments
    #[Route('/', name: 'batimentmalekbouderbela_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $batiments = $em->getRepository(BatimentMalekBouderbela::class)->findAll();

        return $this->render('batiment_malek_bouderbela_c/index.html.twig', [
            'batiments' => $batiments,
        ]);
    }

    // 👁️ Afficher un bâtiment spécifique
    #[Route('/show/{id}', name: 'batimentmalekbouderbela_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $batiment = $em->getRepository(BatimentMalekBouderbela::class)->find($id);

        if (!$batiment) {
            throw $this->createNotFoundException('Bâtiment introuvable.');
        }

        return $this->render('batiment_malek_bouderbela_c/show.html.twig', [
            'batiment' => $batiment,
        ]);
    }

    // ➕ Ajouter un bâtiment
    #[Route('/add', name: 'batimentmalekbouderbela_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $batiment = new BatimentMalekBouderbela();
            $batiment->setNom($request->request->get('nom'));
            $batiment->setNbEtages((int)$request->request->get('nbEtages'));
            $batiment->setDateConstruction(new \DateTime($request->request->get('dateConstruction')));
            $batiment->setDisponibilite($request->request->get('disponibilite'));

            $em->persist($batiment);
            $em->flush();

            return $this->redirectToRoute('batimentmalekbouderbela_index');
        }

        return $this->render('batiment_malek_bouderbela_c/add.html.twig');
    }

    // 📝 Modifier un bâtiment
    #[Route('/update/{id}', name: 'batimentmalekbouderbela_update')]
    public function update(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $batiment = $em->getRepository(BatimentMalekBouderbela::class)->find($id);

        if (!$batiment) {
            throw $this->createNotFoundException('Bâtiment introuvable.');
        }

        if ($request->isMethod('POST')) {
            $batiment->setNom($request->request->get('nom'));
            $batiment->setNbEtages((int)$request->request->get('nbEtages'));
            $batiment->setDateConstruction(new \DateTime($request->request->get('dateConstruction')));
            $batiment->setDisponibilite($request->request->get('disponibilite'));

            $em->flush();

            return $this->redirectToRoute('batimentmalekbouderbela_index');
        }

        return $this->render('batiment_malek_bouderbela_c/update.html.twig', [
            'batiment' => $batiment,
        ]);
    }

    // 🗑️ Supprimer un bâtiment
    #[Route('/delete/{id}', name: 'batimentmalekbouderbela_delete')]
    public function delete(int $id, EntityManagerInterface $em): Response
    {
        $batiment = $em->getRepository(BatimentMalekBouderbela::class)->find($id);

        if ($batiment) {
            $em->remove($batiment);
            $em->flush();
        }

        return $this->redirectToRoute('batimentmalekbouderbela_index');
    }
}
