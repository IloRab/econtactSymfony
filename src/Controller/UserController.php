<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Response, Request};
use Doctrine\Persistence\ManagerRegistry;
use App\Form\UtilisateurType;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/', name: 'root')]
    public function index(): Response
    {
        return $this->redirectToRoute('product_show');
    }

    #[Route('/connection', name: 'product_show')]
    public function connection(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtilisateurType::class);

        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('utilisateur/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        $user =  $form -> getData();

        $entityManager = $doctrine->getManager();
        $user_information = $entityManager->getRepository(Utilisateur::class)->findOneBy(array('nom' => $user -> getNom(),'num' => $user -> getNum()));

        if (!$user_information){
            return $this->render('utilisateur/index.html.twig', [
                'form' => $form->createView(),
                'error_message' => "Connexion impossible, utilisateur inexistant", 
            ]);
        }

        $session = $request->getSession();
        $session->set('nom', $user_information->getNom());
        $session->set('id_nom', $user_information->getIdnom());

        return $this->redirectToRoute('contacts_show');
    }


    #[Route('/contacts', name: 'contacts_show')]
    public function contacts(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $entityManager): Response
    {
        $entityManager = $doctrine->getManager();
        $session = $request->getSession();

        $id_nom = $session->get('id_nom', "NOT_LOGGED_IN");
        if ($id_nom === "NOT_LOGGED_IN"){
            return $this->redirectToRoute('product_show');
        }

        $contacts = $entityManager->getRepository(Utilisateur::class)->findContactsById($id_nom);

        return $this->render('utilisateur/accueil.html.twig', [
            'nom' =>$session->get('nom'),
            'contacts' =>$contacts
        ]);

    }
  }

?>