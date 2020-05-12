$(document).ready(function () {
   
    $('#ajoutliste').keyup(function (event) {
        if (event.keyCode == 13) {
            $('#validliste').click();
            $('#ajoutliste').blur();
        }
    });  

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
        
        $('#ajoutliste').val('');
        });

});
        


