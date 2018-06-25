$( document ).ready(function() {
 /*   $('#searchMovieBa').on('submit', function(e){
        alert('requete');
        e.preventDefault();
       
        $.ajax({
            url : $(this).attr('action'),
            type : $(this).attr('method'),
            data : $(this).serialize(),
            dataType: 'json',
            beforeSend : function(xhr){
                console.log('BEFORESEND : Requete en cours ...')
                
                console.log($(this).data);
            },

            success : function(data,status,xhr){
                console.log('SUCCESS data =' + data +' -- status =' + status +' -- xhr =' + xhr);
                console.log(data);
                
            },
            error : function(xhr,status,error){
                console.log('ERROR : erreur execution ajax !!' );
                console.log('jqXHR =' + xhr
                            +' --textstatus =' +status
                            +' --errorThrown =' + error);
            },
            complete : function(xhr,status){
                console.log('COMPLETE xhr = ' + xhr +' -- status =' + status );
            },
            statusCode : {
                404 : function(){
                console.log('STATUSCODE :404 : page not found !!!');
                }
            }

        })
    });*/
   
    
    
    $('#search').autocomplete({
        source : function(requete, reponse){ // les deux arguments représentent les données nécessaires au plugin
        $.ajax({
                url : 'http://streamaddikt/jfadd/index.php?page=jasonFilms', // on appelle le script JSON
                dataType : 'json', // on spécifie bien que le type de données est en JSON
                data : {
                    name_startsWith : $('#search').val(), // on donne la chaîne de caractère tapée dans le champ de recherche
                    maxRows : 15
                    
                },
                
                success : function(donnee){
                    reponse($.map(donnee.title, function(objet){
                        console.log(objet.title);
                        return objet.title  // on retourne cette forme de suggestion
                    }));
                }
            });
        }
    });

});