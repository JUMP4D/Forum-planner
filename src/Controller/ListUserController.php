<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RoleType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ListUserController extends AbstractController
{
    #[Route('/listuser', name: 'app_list_user')]
    #[IsGranted('ROLE_ADMIN', message: "Vous n'êtes pas autorisé à accéder au tableau de bord d'administration.")]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $listUser = [];
        foreach ($users as $user) {
            $listUser[] = [
                'id' => $user->getId(),
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
            ];
        }


        return $this->render('list_user/index.html.twig', [
            'listUsers' => $listUser,
        ]);
    }

    #[Route('/listuser/{id}', name: 'modifier_role')]
    #[IsGranted('ROLE_ADMIN', message: "Vous n'êtes pas autorisé à accéder au tableau de bord d'administration.")]
    public function getName(User $user, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(RoleType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_list_user');
        }

        return $this->render('list_user/Change_role.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
