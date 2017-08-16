<?php

namespace src\Entity;

class Mail
{
    /**
     * @var String
     */
    private $subject;

    /**
     * @var String
     */
    private $email;

    /**
     * @var String
     */
    private $content;

    /**
     * Mail constructor.
     * @param $subject
     * @param $email
     * @param $content
     */
    public function __construct($subject, $email, $content)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * @return array|string
     */
    public function sendMail()
    {
        $errors = $this->checkMail();
        if ($errors) {
            return $errors;
        } else {
            return ["Votre message à bien été envoyé."];
        }
    }

    /**
     * @return array
     */
    private function checkMail()
    {
        $errors = [];
        if (strlen($this->subject) < 1){
            $errors[] = "Vous devez renseigner le champ sujet";
        }
        if (strlen($this->email) < 1){
            $errors[] = "Vous devez renseigner le champ email";
        }
        if (strlen($this->content) < 1){
            $errors[] = "Vous devez renseigner le champ message";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Vous devez renseigner une adresse email";
        }

        return $errors;
    }
}
