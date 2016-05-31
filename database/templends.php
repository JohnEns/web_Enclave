
<hr>
        
         <h2><a href="dagtekst.php">Terug naar Dagtekst Lorber</a></h2><br> 
        <h2><a href="../../index.php">Terug naar homepage Enclave </a></h2><br>
        
        
<p><button id="bronknop" title="Click voor Code" onclick="toggleCodeBlock();">Toon broncode</button></p>
<p id="codeblock" style="display: none;"><code><?php highlight_file($pagina); ?></code></p>

</main>	
</section>

<footer>
    <nav>
        <ul id="footer-menu">
            <li><a href="mailto:PoeHaoSan@gmail.com">Contact</a></li>
            <li><a href="https://www.youtube.com/user/PoeHaoSan" target="_blank">YouTube</a></li>
            <li><a href="https://twitter.com/PoeHao" target="_blank">Twitter</a></li>
            <li><a href="https://www.facebook.com/Poe.Hao.San" target="_blank">Facebook</a></li>
            <li><a href="http://frontpage.fok.nl/games" target="_blank">Fok-Games</a></li>

        </ul>
        <p>These links take you away</p>		
    </nav>
    <div class="copyright-notice">&copy; 2015 Poe Hao San</div>
</footer>	
</div>

</body>

</html>
<?php 
//Close db connection vrienden
//mysqli_close($conn); 

//Close db connection verkeer
//mysqli_close($con2); 

//Close db connection lorber
mysqli_close($conl); 
?>