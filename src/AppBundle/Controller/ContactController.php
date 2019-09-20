<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

// src/AppBundle/Controller/LuckyController.php

// ...
class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact", methods={"GET"})
     * @Template
     */
    public function contactAction()
    {
        return [];
    }


    /**
     * @Route("/contact", methods={"POST"})
     */
    public function messageAction(Request $request, \Swift_Mailer $mailer)
    {
        //dump($request);

        $prenom = $request->request->get('prenom');
        $nom = $request->request->get('nom');
        $mail = $request->request->get('mail');
        $cause = $request->request->get('cause');
        $subscribe = $request->request->get('subscribe');
        $reputation = $request->request->get('reputation');

        //dump($prenom, $nom, $mail, $cause, $cause, $subscribe, $reputation);
        $message = (new \Swift_Message('Nouveau contact sur le site'))
            ->setFrom('contact@ilayoga.com')
            ->setTo('demanie.maxime@hotmail.fr')
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/contact.html.twig
                    'Emails/contact.html.twig',
                    [
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'mail' => $mail,
                        'cause' => $cause,
                        'subscribe' => $subscribe,
                        'reputation' => $reputation
                    ]
                ),
                'text/html'
            );

        $mailer->send($message);

        return $this->redirectToRoute('contact');
    }
}
