<?php

/**
 * Description of LoginView
 *
 * @author Poe
 */
class NewsView {

    private $viewModel;

    public function __construct(NewsViewModel $viewModel) {
        $this->viewModel = $viewModel;
    }

    public function WriteHtml() {
        if (strlen($this->viewModel->ErrorMessage) > 0) {
            echo "<h2>" . $this->viewModel->ErrorMessage . "</h2>";
        } elseif ($this->viewModel->NewsModel != null) {
            echo"<h2>Jouw Data:</h2>";
            echo "<p>Welkom " . $this->viewModel->NewsModel->userName . "</p><br/>";
            echo "<p>Je email is: " . $this->viewModel->NewsModel->email . "</p><br/>";
            echo "<p>Je bent nu aangemeld voor de nieuwsbrief</p><br/>";

            $nieuwsbrief = fopen("nieuwbrief.txt", "a") or die("Kon nieuwbrief.txt niet openen!");
            $txt = $this->viewModel->NewsModel->email . "," . $this->viewModel->NewsModel->userName . "," . $this->viewModel->NewsModel->woonplaats . "\n";
            fwrite($nieuwsbrief, $txt);
            $txt = "Extra \n";
          
        }
    }

}
