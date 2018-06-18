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
        source : $(this).attr('action'),
        dataType: 'json'
    });
    
    


});