<?php

namespace Blog\Controller;

use src\Entity\User;

/**
 * Class LoginAction
 * @package Blog\Controller
 */
class LoginAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userEntity = new User();

            $pseudo = isset($_REQUEST["pseudo"]) ? $_REQUEST["pseudo"] : "";
            $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";

            if ($userEntity->login($pseudo, $password)) {
                $response[] = "login ok.";
            } else {
                $response[] = "Le mot de passe ne correspondent pas.";
            }
        }

        $this->render("admin/login", ["msg" => $response]);
    }
}
