/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function toggleCodeBlock()
{
    var el = document.getElementById("codeblock");
    if (el == null)
        return;

    var button = document.getElementById("bronknop");
    if (button == null)
        return;

    // ternary expression
    // el.style.display = el.style.display == "none" ? "" : "none";

    if (el.style.display === "none") {
        el.style.display = "";
        var audio = new Audio('../sound/klapuit.mp3');
        audio.play();
        el.scrollIntoView();
        button.innerHTML = "Verberg broncode";
    }
    else {
        el.style.display = "none";
        var audio = new Audio('../sound/klapin.mp3');
        audio.play();
        button.innerHTML = "Toon broncode";
    }
}