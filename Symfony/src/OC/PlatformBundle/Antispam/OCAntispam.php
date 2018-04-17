<?php
// src\OC\PlatformBundle\Antispam\OCAntispam.php

namespace OC\PlatformBundle\Antispam;

class OCAntispam
{
    private $mailer;
    private $locale;
    private $minLength;
    
    public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
    {
        // on récupère les variables définies dans
        // services.yml
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->minLength = (int) $minLength;
    }
    
    /**
     * Vérifie si le texte est un spam ou non
     * en vérifiant que le texte de l'annonce
     * fasse plus de 50 caractères (une annonce de 
     * moins de 50 caractères n'est pas très sérieuse!)
     * 
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < 50;
    }
}