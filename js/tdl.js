$(document).ready(function () {
    gettache();
    gettachea();
    newtache();
    
   
})   
   function newtache() {
    $('#ajout-tache').keyup(function (event) {
        if (event.keyCode == 13) {
            $('#valid-tache').click();
            $('#ajout-tache').blur();
        }
    });  

    $('#valid-tache').click(function () {
        var nom = document.getElementById('ajout-tache').value; 
        if (nom != '') {
        $.ajax({
            method: "POST",
            url: "fonction.php",
            data: {'function': 'newtache', 'nom': nom},
            datatype: "json",    
        
        }).done(function(msg){
           
        console.log(msg);
            });
        gettache();
         }
        
        $('#ajout-tache').val('');
        });


    }

   function gettache() {
   
    $('.td').remove();
    $.ajax({
        url: "fonction.php",
        method: "POST",
        data: { 'function': 'gettache'},
        datatype: "json",
        success: function(datatype)
        {
           
           var data = JSON.parse(datatype);
            for (i = 0; i < data.length; i++) {
                $('#taches').append("<div class='td' id='to" + i +"'>");
                $.each(data[i], function (key,value) {
                    if(key !== "id")
                    {
                        $('#to' + i + "").append("<b>" + key + "</b>" + ":" + value + '</br></div>');
                    } 
                    else if(key === "id")
                    {
                        $('#to' + i + "").append("<button class='button' id='sup" + value + "'>Supprimer</button>");
                        $('#to' + i + "").append("<button class='button' id='fin" + value + "'>C'est fait!</button></br>");
                       
                       supptache(value);
                       tachefini(value);
                    }
                })

            

           }
        }
    })
    
   }

    function supptache(value){
        $('#sup' + value + "").click(function(){
    
            $.ajax({
                url: "fonction.php",
                method : "POST",
                data : {'function' : 'supptache', 'id_tache' : value},
                datatype : "json",
            })
            gettache();
    
        })
    }

    function tachefini(value){
        $('#fin' + value + "").click(function(){
    
            $.ajax({
                url: "fonction.php",
                method : "POST",
                data : {'function' : 'tachefini', 'id_tache' : value},
                datatype : "json",
            })
            gettache();
            gettachea();
    
        })
    }

    function gettachea(){
        $('.tf').remove();
        $.ajax({
            url: "fonction.php",
            method: "POST",
            data : {'function' : 'gettachea'},
            datatype: "json",
        
            success: function (datatype) {

            var data = JSON.parse(datatype);

        
                for (i = 0; i < data.length; i++) {
                    $('#tachefi').append("<div class='tf' id='fi" + i +"'>");
                    $.each(data[i], function (key,value) {
                        if(key !== "id")
                        {
                            $('#fi' + i + "").append("<b>" + key + "</b>" + ":" + value + '</br>');
                        } 
        
                    })
        
                    }
            }
        
            }) 
        }


  

        


