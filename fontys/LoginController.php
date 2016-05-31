<?php

/**
 * Login form controller
 */
class LoginController {

    /**
     * Start de controller (met het controleren van de post-data)
     * @return \LoginView
     */
    public function start() {
        $viewModel = new LoginViewModel();

        $viewModel->IsPost = strtoupper($_SERVER["REQUEST_METHOD"]) === "POST";
        if ($viewModel->IsPost) {
            $viewModel->LoginModel = new LoginModel();

            if (!$this->checkLogin($viewModel->LoginModel->userName, $viewModel->LoginModel->password)) {
                $viewModel->ErrorMessage = "Gebruikersnaam en/of wachtwoord zijn onbekend";
            }
          }
         return new LoginView($viewModel);
    }

    private function checkLogin($userName, $password) {
        $users = array("gebruikerx" => "123456", "test" => "test", "John" => "Ensberg");
        if (array_key_exists($userName, $users) && $users[$userName] === $password) {
            return true;
        }
        return false;
    }

}
