<?php

/**
 * Login form controller
 */
class ThemaController {

    public $viewModel;
    /**
     * Start de controller (met het controleren van de post-data)
     * @return \ThemaView
     */
    public function start() {
       $this->viewModel = new ThemaViewModel();

        $this->viewModel->IsPost = strtoupper($_SERVER["REQUEST_METHOD"]) === "POST";
        if ($this->viewModel->IsPost) {
        $this->viewModel->ThemaModel = new ThemaModel();}
        
//            if (!$this->checkThema($viewModel->ThemaModel->themePick)) 
//                {
//                    $viewModel->ThemaModel = new ThemaModel();
//            $viewModel->ErrorMessage = "Er is geen thema gekozen wij hebben dus iets voor je ingesteld";
//            }
//        
//         print("Test: " . $viewModel->Theme->textColor);
         return new ThemaView($this->viewModel);
    }
    
//        public function start() {
//        $viewModel = new LoginViewModel();
//
//        $viewModel->IsPost = strtoupper($_SERVER["REQUEST_METHOD"]) === "POST";
//        if ($viewModel->IsPost) {
//            $viewModel->LoginModel = new LoginModel();
//
//            if (!$this->checkLogin($viewModel->LoginModel->userName, $viewModel->LoginModel->password)) {
//                $viewModel->ErrorMessage = "Gebruikersnaam en/of wachtwoord zijn onbekend";
//            }
//          }
//         return new LoginView($viewModel);
//    }


//$model = new ThemaModel();
//print("Test: " + $model->theme->backgroundColor);
//
//    private function checkThema($themePick) {
//        if (!isset($themePick)) {
//            return false;
//        }
//        return true;
//    }
}

//     public function start() {
//        $viewModel = new ThemaViewModel();
//
//        $viewModel->IsPost = strtoupper($_SERVER["REQUEST_METHOD"]) === "POST";
//        if ($viewModel->IsPost) {
//            $viewModel->ThemaModel = new ThemaModel();
//
//            if (!$this->checkThema($viewModel->ThemaModel->themePick)) {
//                $viewModel->ErrorMessage = "Er is geen thema gekozen wij hebben dus iets voor je ingesteld";
//            }
//          }
//         return new ThemaView($viewModel);
//    }
