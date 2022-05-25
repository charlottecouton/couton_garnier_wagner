const searchinput = document.getElementById('searchInput');

if(searchinput){


searchinput.addEventListener('keyup', function(){

   //$('#suggestion').html('');
   //document.getElementById('suggestion').innerHTML = ''
    var informations = searchinput.value;

    if(informations != ""){
        $.ajax({//ajax permet de recharger une partie de la page sans recharger la page entièrement
            type: 'GET',
            url: 'barre_de_recherche.php',
            data: 'user=' + encodeURIComponent(informations),
            success: function(data){
                if(data != ""){
                    document.getElementById('suggestion').innerHTML = data;
                    // $('#suggestion').append(data);
                    
                }else{
                    console.log("pas de donnees");
                    document.getElementById('suggestion').innerHTML = "<div>Aucun résultat</div>"//"<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
                }
            }
        });
    }
});
}

    