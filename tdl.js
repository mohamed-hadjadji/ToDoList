$(document).ready(function () {
    newlist();
   
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
            data: {'function': 'newlist', nom: nom},
            datatype: "json",
        success:function(data) { afficherlist(); }
        
        }).done(function(msg){
           
        console.log(msg);
            });
         }
        
        $('#ajoutliste').val('');
        });
     afficherlist();
    }

   function afficherlist() {
    $.ajax({
        url: "fonction.php",
        type: "POST",
        data: { 'function': 'afficherlist'},
        cache: false,
        success: function(data){
           
            $('#listes').html(data); 
        }
    });

    }

        


