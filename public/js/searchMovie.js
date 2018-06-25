$( document ).ready(function() {

    $('#search').autocomplete({
        source : function(requete, reponse){ // les deux arguments représentent les données nécessaires au plugin
        $.ajax({
                url : 'http://streamaddikt/index.php?page=jasonFilms', // on appelle le script JSON
                dataType : 'json', // on spécifie bien que le type de données est en JSON
                data : {
                    //name_startsWith : $('#search').val(), // on donne la chaîne de caractère tapée dans le champ de recherche
                    term:requete.term,
                    maxRows : 15
                    
                },
                
                success : function(donnee){
                    reponse(donnee);
                        
                }
            });
        },
        minLenght:1,
        select:function(event,ui){
            $(location).attr('href','index.php?page=infoMovies&title='+ ui.item.label);
        }
    });

});