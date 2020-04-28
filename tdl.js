$(document).ready(function () {
       

    $('#validliste').click(function () {
        var nom = $('#ajoutliste').val(); 
        if (nom != '') {
        $.ajax({
            method: "POST",
            url: "fonction.php",
            data: {'function': 'newlist', 'titre': nom},
        }).done(function(msg){
           
        console.log(msg);
            });
         }
        });
    });
        


