<?php

/**
 * Description of LoginView
 *
 * @author Poe
 */
class LoginView {

    private $viewModel;

    public function __construct(LoginViewModel $viewModel) {
        $this->viewModel = $viewModel;
    }

    public function WriteHtml() {
        if (strlen($this->viewModel->ErrorMessage) > 0) {
            echo "<h2>" . $this->viewModel->ErrorMessage . "</h2>";
        }
        elseif ($this->viewModel->LoginModel != null) {
            echo"<h2>Jouw Data:</h2>";
            echo "<p>Welkom " . $this->viewModel->LoginModel->userName . "</p><br/>";
            echo "<p>Je wachtwoord is: " . $this->viewModel->LoginModel->password . "</p><br/>";
            //echo "<p>Je gekozen kleur is: " . $this->viewModel->LoginModel->colorpick . "</p><br/>";
        }
    }

}
