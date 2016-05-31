<?php

/**
 * Login form controller
 */
class NewsController {

    /**
     * Start de controller (met het controleren van de post-data)
     * @return \LoginView
     */
    public function start() {
        $viewModel = new NewsViewModel();

        $viewModel->IsPost = strtoupper($_SERVER["REQUEST_METHOD"]) === "POST";
        if ($viewModel->IsPost) {
            $viewModel->NewsModel = new NewsModel();

            if    (!$this->checkEmail($viewModel->NewsModel->email)) {
            $viewModel->ErrorMessage = "Dit emaildres lijkt niet te kloppen. Controleer het alsjeblieft!";
        }    
//      if (isset($viewModel->NewsModel->userName) or ($viewModel->NewsModel->email) or ($viewModel->NewsModel->woonplaats)){
                
            
            }
            elseif (!isset($viewModel->NewsModel->userName) or ($viewModel->NewsModel->email) or ($viewModel->NewsModel->woonplaats)){
            $viewModel->ErrorMessage = "Sorry, maar alle velden moeten worden ingevuld!";    
            }    

//        }
//                $viewModel->ErrorMessage = "Bedankt voor uw aanmelding";
            return new NewsView($viewModel);
        }

    private function checkEmail($email) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    }


            
           