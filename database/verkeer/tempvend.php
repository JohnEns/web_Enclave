
<hr>
        <h2><a href="index.php">Naar originele index </a></h2>
        
        <h2><a href="../index.php">Terug naar database-index </a></h2><br>
        
        
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
mysqli_close($conn); 
mysqli_close($con2); 
mysqli_close($conl); 
?>