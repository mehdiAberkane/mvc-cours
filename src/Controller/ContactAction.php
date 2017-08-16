<?php

namespace Blog\Controller;

use src\Entity\Mail;

/**
 * Class IndexAction
 * @package src\Controller
 */
class ContactAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";
            $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
            $content = isset($_REQUEST["content"]) ? $_REQUEST["content"] : "";
            $mail = new Mail($subject, $email, $content);

            $response = $mail->sendMail();
        }

        $this->render("contact", $response);
    }
}
