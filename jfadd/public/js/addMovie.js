$( document ).ready(function() {
    


    var addMovie = {

        titleM : $('#title'),
        titleL : $('#titleLink'),
        kind : $('#kind'),
        year : $('#year'),
        tag : $('#tagline'),
        img : $('#image'),
        note : $('#note'),
        prod : $('#prod'),
        synops : $('#synopsis'),
        movie : $('#valImdb'),
        linkMovie : $('#valImdbLink'),
        closeM : $('#closeMovie'),
        closeL : $('#closeMovieLink'),
        erase : $('.erase'),
        acteur : $('#acteur'),

        initaddMovie: function () {
            this.clickMovie();
            this.clickLInkMovie();
        },

        clickMovie:function () {
            this.movie.click(function(){
                alert($('#imdbMovie').val())
                var apiUrlMovieO = "http://www.omdbapi.com/?i="+$('#imdbMovie').val()+"&apikey=452b5d61";
                /*take data to json*/
                ajaxGet(apiUrlMovieO, function (reponse) {
                    var media=JSON.parse(reponse);
                    /*insert in dom*/    
                    addMovie.kind.append(media.Genre)
                    addMovie.year.val(media.Year);
                    addMovie.img.val(media.Poster);
                    addMovie.note.val(media.imdbRating);
                    addMovie.prod.val(media.Production);
                    addMovie.acteur.val(media.Actors);
                });
                var apiUrlMovieT = "https://api.themoviedb.org/3/movie/"+$('#imdbMovie').val()+"?api_key=3f531cbbcdf04ba2affab6f4e07dfd0d&language=fr";
                /*take data to json*/
                ajaxGet(apiUrlMovieT, function (reponse) {
                    /*insert in dom*/  
                    var media=JSON.parse(reponse);
                    addMovie.titleM.val(media.title);
                    addMovie.synops.append(media.overview);
                });
            });
                    /*erase info in modul*/
            this.closeM.click(function(){
                location.reload(true);
                
            });
  
        },

        clickLInkMovie:function () {
            this.linkMovie.click(function(){
                var apiUrlLink = "https://api.themoviedb.org/3/movie/"+$('#imdbLink').val()+"?api_key=3f531cbbcdf04ba2affab6f4e07dfd0d&language=fr";
                /*take data to json*/
                ajaxGet(apiUrlLink, function (reponse) {
                    var media=JSON.parse(reponse);
                    /*insert in dom*/
                    addMovie.titleL.val(media.title);
                });
            });
        }
          
    }

    addMovie.initaddMovie();
});

/* *** for tmdb *** */

/*$( document ).ready(function() {
    


    var addMovie = {

        titleM : $('#title'),
        titleL : $('#titleLink'),
        kind : $('#kind'),
        year : $('#year'),
        tag : $('#tagline'),
        img : $('#image'),
        note : $('#note'),
        prod : $('#prod'),
        synops : $('#synopsis'),
        movie : $('#valImdb'),
        linkMovie : $('#valImdbLink'),
        closeM : $('#closeMovie'),
        closeL : $('#closeMovieLink'),
        erase : $('.erase'),

        initaddMovie: function () {
            this.clickMovie();
            this.clickLInkMovie();
        },

        clickMovie:function () {
            this.movie.click(function(){
                var apiUrlMovie = "http://www.omdbapi.com/?i="+$('#imdbMovie').val()+"&apikey=452b5d61";*/
                /*take data to json*/
        /*        ajaxGet(apiUrlMovie, function (reponse) {
                    var media=JSON.parse(reponse);*/
                    /*insert in dom*/
        /*            addMovie.titleM.val(media.title);
                    var kinds=media.genres;
                    kinds.forEach(function(element){
                        this.kind.append(element.name + ' ');
                    });   
                    addMovie.year.val(media.release_date);
                    addMovie.tag.val(media.tagline);
                    var poster=media.belongs_to_collection;
                    addMovie.img.val(poster.poster_path);
                    addMovie.note.val(media.vote_average);
                    var prods=media.production_companies;
                    prods.forEach(function(element){
                        this.prod.append(element.name + ' ');
                    });   
                    addMovie.synops.append(media.overview);
                });
            });*/
                    /*erase info in modul*/
        /*    this.closeM.click(function(){
                location.reload(true);
                
            });
  
        },

        clickLInkMovie:function () {
            this.linkMovie.click(function(){
                var apiUrlLink = "https://api.themoviedb.org/3/movie/"+$('#imdbLink').val()+"?api_key=3f531cbbcdf04ba2affab6f4e07dfd0d&language=fr";*/
                /*take data to json*/
   /*             ajaxGet(apiUrlLink, function (reponse) {
                    var media=JSON.parse(reponse);*/
                    /*insert in dom*/
   /*                 addMovie.titleL.val(media.title);
                });
            });
        }
          
    }

    addMovie.initaddMovie();
});
*/
