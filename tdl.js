$(document).ready(function () {
    newlist();
    afficherlist();
})   
   function newlist() {
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
            datatype: "json",
        
        
        }).done(function(msg){
           
        console.log(msg);
            });
         }
        
        $('#ajoutliste').val('');
        });
    }

   function afficherlist() {
    $.ajax({
        method: "POST",
        url: "fonction.php",
        data: { 'function': 'afficherlist'},
        datatype: "json",
    }).done(function(msg){
           
        console.log(msg);
            });
    }

        


