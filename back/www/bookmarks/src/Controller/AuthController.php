<?php

namespace App\Controller;

use App\Entity\User;
use Lcobucci\JWT\Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthController extends ApiController
{

    /**
     * @Route("/api/register", name="api_register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->transformJsonBody($request);
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');

        if (empty($username) || empty($password) || empty($email)) {
            return $this->respondValidationError("Invalid Username or Password or Email");
        }

        try {
            $user = new User($username);
            $user->setPassword($encoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setUsername($username);
            $em->persist($user);
            $em->flush();
        } catch (\Exception $e) {
            return $this->setStatusCode(400)->respondWithErrors('username or email already exists.');
        }

        return $this->respondWithSuccess(sprintf('User %s successfully created', $user->getUsername()));
    }

    /**
     * @Route("/api/login_check", name="api_login_check", methods={"POST"})
     */
    public function getTokenUser(UserInterface $user, JWTTokenManagerInterface $JWTManager)
    {
    }
}
