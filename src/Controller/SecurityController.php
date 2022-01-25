<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
<<<<<<< HEAD
=======
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

<<<<<<< HEAD
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' 
        => $error]);
=======
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
