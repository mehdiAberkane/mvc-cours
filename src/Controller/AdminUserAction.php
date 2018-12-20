<?php

namespace Blog\Controller;

use src\Entity\User;

/**
 * Class AdminPostAction
 * @package src\Controller
 */
class AdminUserAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $response = [];die("Maintenance");
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userEntity = new User();
            $pseudo = isset($_REQUEST["pseudo"]) ? $_REQUEST["pseudo"] : "";
            $password = isset($_REQUEST["password_1"]) ? $_REQUEST["password_1"] : "";
            $password2 = isset($_REQUEST["password_2"]) ? $_REQUEST["password_2"] : "";
	    if ($password == $password2 && strlen($password) > 1) {
                $userEntity->setPseudo($pseudo);
                $userEntity->setPassword($password);
                $response[] = $userEntity->create();
	    } else {
		die("marche pas");
                $response[] = "Les mots de passe ne correspondent pas.";
            }
        }
    
	$this->render("admin/user", $response);
    }
}
