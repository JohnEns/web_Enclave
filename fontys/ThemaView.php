<?php

/**
 * Description of LoginView
 *
 * @author Poe
 */
class ThemaView {
//    private $viewModel;
//    private $controller;
    private $tc;
    private $viewModelNu;




    public function __construct($viewModel) {
//        $this->Theme->myTheme = $viewModel;
//        $this->controller = $controller;
        $this->viewModelNu = $viewModel;
    }
//    }

//    public function WriteHtml() {
//        if (strlen($this->viewModel->ErrorMessage) > 0) {
//            echo "<h2>" . $this->viewModel->ErrorMessage . "</h2>";
//        }
//        elseif ($this->viewModel->ThemaModel != null) {
//            echo"<h2>Jouw Data:</h2>";
////            echo "<p>Welkom " . $this->viewModel->ThemaModel->userName . "</p><br/>";
////            echo "<p>Je wachtwoord is: " . $this->viewModel->ThemaModel->password . "</p><br/>";
//            echo "<p>Je gekozen thema is: " . $this->viewModel->ThemaModel->themeName . "</p><br/>";
//            echo "<p>Variabele themapick is: " . $this->viewModel->ThemaModel->themePick . "</p><br/>";
//            echo "<p>Variabele achtergrond is: " . $this->viewModel->ThemaModel->backgroundColor . "</p><br/>";
//            echo "<p>Variabele tekst is: " . $this->viewModel->ThemaModel->textColor . "</p><br/>";
//            
//        }
//    }
//
//}
// View:
    public function WriteHtml(){
//         if (strlen($this->viewModel->ErrorMessage) > 0) {
//            echo "<h2>" . $this->viewModel->ErrorMessage . "</h2>";
//        }
//        elseif ($this->viewModel->Theme != null) { 
       
       echo $this->viewModelNu->Theme->textColor;
       
   
 
//            echo "<input type=hidden name=test1 id=test2 value='" . $model->theme->backgroundColor . "'>";
    }
}
//}
//class LoginView {
//
//    private $viewModel;
//
//    public function __construct(LoginViewModel $viewModel) {
//        $this->viewModel = $viewModel;
//    }
//
//    public function WriteHtml() {
//        if (strlen($this->viewModel->ErrorMessage) > 0) {
//            echo "<h2>" . $this->viewModel->ErrorMessage . "</h2>";
//        }
//        elseif ($this->viewModel->LoginModel != null) {
//            echo"<h2>Jouw Data:</h2>";
//            echo "<p>Welkom " . $this->viewModel->LoginModel->userName . "</p><br/>";
//            echo "<p>Je wachtwoord is: " . $this->viewModel->LoginModel->password . "</p><br/>";
//            //echo "<p>Je gekozen kleur is: " . $this->viewModel->LoginModel->colorpick . "</p><br/>";
//        }
//    }
//
//}
