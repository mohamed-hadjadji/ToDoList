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
        var nom = $('#ajout-tache').val(); 
        if (nom != '') {
        $.ajax({
            method: "POST",
            url: "fonction.php",
            data: {'function': 'newtache', 'nom': nom},
            datatype: "json",    
        success: function(data){
         gettache();
        }
        }).done(function(msg){
           
        console.log(msg);
            });
         }
        
        $('#ajout-tache').val('');
        });


    }

   function gettache() {
   
    $('.tach').remove();
    $.ajax({
        url: "fonction.php",
        method: "POST",
        data: { 'function': 'gettache'},
        datatype: "json",
        success: function(datatype)
        {
           
           var data = JSON.parse(datatype);
            for (i = 0; i < data.length; i++) {
                $('#taches').append("<div class='tach' id='todo" + i +"'>");
                $.each(data[i], function (key,value) {
                    if(key !== "id")
                    {
                        $('#todo' + i + "").append("<b>" + key + "</b>" + ":" + " " + value + '</br></div>');
                    } 
                    else if(key === "id")
                    {
                        $('#todo' + i + "").append("<button class='btn btn-outline-danger' id='ann" + value + "'>Annuler</button>");
                        $('#todo' + i + "").append("<button class='btn btn-outline-primary' id='acc" + value + "'>Accomplie</button></br>");
                       
                       supptache(value);
                       tachefini(value);
                    }
                })

            

           }
        }
    })
    
   }

    function supptache(value){
        $('#ann' + value + "").click(function(){
    
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
        $('#acc' + value + "").click(function(){
    
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
        $('.tafin').remove();
        $.ajax({
            url: "fonction.php",
            method: "POST",
            data : {'function' : 'gettachea'},
            datatype: "json",
        
            success: function (datatype) {

            var data = JSON.parse(datatype);

        
                for (i = 0; i < data.length; i++) {
                    $('#tachefi').append("<div class='tafin' id='fini" + i +"'>");
                    $.each(data[i], function (key,value) {
                        if(key !== "id")
                        {
                            $('#fini' + i + "").append("<b>" + key + "</b>" + ":"+ " " + value + '</br>');
                        } 
        
                    })
        
                    }
            }
        
            }) 
        }


  

        


