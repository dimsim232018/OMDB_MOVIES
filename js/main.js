var res;



$(document).ready(()=> {

	$('#searchForm').on('submit', (e)=> {

	  let searchText=$('#searchText').val();

	  sessionStorage.setItem('searchText',searchText);

      getMovies(searchText);

      e.preventDefault();

   });   

   

});



function getMovies(searchText){

	/*console.log(searchText);*/

   axios.get('http://www.omdbapi.com/?apikey=c5c1ebdb&s='+searchText)

   

      .then((response)=> {

         console.log(response);

		 let output=' ';

		 if (response.data.Response=="False"){



			alert('No results... Please try again!');}



			/* output =`

			   <div class="jumbotron" id="no_results">

					<p style="color:#fff;">No results!</p>

				</div>

			`

			 }*/





		 else{

         let movies = response.data.Search;

         $.each(movies, (index, movie) => {

            output +=`

               

			   <div class="col-md-3" id="movie_board">

                  <div class="well text-center" id="movie_item">

						<a onclick="movieSelected('${movie.imdbID}')">

							<object data="${movie.Poster}" type="image/jpg" id="movie_poster">

								<img src="/webeng3/media/no_img.png" id="no_poster">

							</object>

						</a>

							<br>

				<!-- <a href="" class="btn btn-profile" id="movie_button_1" href="movie.php">+</a> -->

							<h6>

								<a onclick="movieSelected('${movie.imdbID}')" id="movie_title">${movie.Title}</a>

							</h6>

				<!-- <a onclick="movieSelected('${movie.imdbID}')" class="btn btn-primary" id="movie_button_1" href="movie.php">Λεπτομέρειες</a> -->

                   </div>

               </div>

			   

            `;   

         });

         }

         $('#movies').html(output);  

      })

      .catch((err)=> {

         console.log(err);

      

     });   

}



function movieSelected(id){    

   sessionStorage.setItem('movieId',id);

   window.location= 'movie.php' ;

   return false;

}	



function getMovie(param){

	 let movieId = sessionStorage.getItem('movieId');

	  axios.get('http://www.omdbapi.com/?apikey=c5c1ebdb&i='+movieId) 

      

      .then((response)=> {

         console.log(response);

         let movie=response.data;

         res=response.data;

      let output=`

         <div class="row">

            <div class="jumbotron col-auto" id="movie_poster_jumbo">

			 		<!-- <img src="${movie.Poster}" class="thumbnail"> -->

			 		<object data="${movie.Poster}" type="image/jpg" id="movie_poster_full">

						<img src="/webeng3/media/no_img.png" id="no_poster_full">

					</object>

            </div>

				<!-- <div class="col-md-auto"> -->

					<div class="jumbotron col-8" id="movie_details_jumbo">

						<h2 id="movie_title_full">${movie.Title}</h2>

				

			      		<ul class="list-group">

				    			<li class="list-group-item" id="genre_li"> <strong>Genre :</strong> ${movie.Genre} </li>

					 			<li class="list-group-item" id="release_li"> <strong>Release date :</strong> ${movie.Released} </li>

					 			<li class="list-group-item" id="director_li"> <strong>Director :</strong> ${movie.Director} </li>

					 			<li class="list-group-item" id="cast_li"> <strong>Cast :</strong> ${movie.Actors} </li>

					 			<li class="list-group-item" id="plot_li"> <strong>Plot :</strong> ${movie.Plot} </li>

				  			</ul>

					</div>

				</div>

        <!--	</div> -->

		<div class="row">

		   <div class="well">

		 <br>

		 <!--  <h6>Movie Details</h6> -->

		 <!--  <br> -->

		 <!--    ${movie.Plot} &nbsp;&nbsp;&nbsp; -->

			 <a href="https://www.imdb.com/title/${movie.imdbID}/" target="_blank" class="btn btn-login" id="movie_btn_1">View movie in IMDB</a>

			 

			  <a href="index.php?search=`;

			  output+=sessionStorage.getItem('searchText');

			  output+=`" class="btn btn-main" id="movie_btn_2">Back to search results...</a>`;

              if (param){

         

                  output+=`<button class="btn btn-profile" id="movie_btn_3" onclick="saveMovie()">Add to Wishlist!</button></div></div>`

              }

               /* output+=` 

			  <form id="myForm" action ="addtofav.php"  method = "POST">

				<input  id = "gen" name = "gen" type="hidden" value="${movie.Genre}"/>

				<input  id = "title" name = "title" type="hidden" value="${movie.Title}"/>

				<input  id = "movid" name = "movid" type="hidden" value="${movie.imdbID}" />

				<button id="sub" class="btn btn-primary">Προσθήκη στην λίστα</button>

            </form>

            <span id="result"></span></div></div>`;} */

              else{

					output+=`<a href="login.php" class="btn btn-profile" id="movie_btn_disabled">Please sign in for Wishlist features!</a></div></div>`

              }      

		   

       $('#movie').html(output);	  

      })

      .catch((err)=> {

         console.log(err);

      

     });   

}



function saveMovie(){    

    // get data

    var params={'title':res['Title'],'imdbID':res['imdbID'],'genre':res['Genre']};

	$.ajax({

	  //dataType:"json",

	    dataType: "",

		url: "addtofav.php",

		data: params

			})

	.done(function(data){

		//$('#msg_box').text(data.slice(8,38));

		//$('#msg_box').text(data);

		console.log(data);

		if(data == "Already liked"){

			$('#msg_box').text(data);

		}else{

			$('#msg_box').text(data.slice(8,38));

		}

	})

	.fail(function(jqXHR, exception) {

		//$('#msg_box').text("ajax error.");

		$('#msg_box').text(exception);

	});

}



function deletemovie(r){



		var i = r.parentNode.parentNode.rowIndex;

		var title= document.getElementById("data-table").rows[i].cells[0].innerHTML;

		console.log(title);

		$.ajax({

			url: 'deletefromfav.php',

			data: {'title':title}

			})

		.done(function(data){

		    console.log(data);

			var i = r.parentNode.parentNode.rowIndex;

			document.getElementById("data-table").deleteRow(i);

		})

		.fail(function(jqXHR, exception) {

			console.log(exception);

		});

}


function load_data()
 {
 var select= document.getElementById("search");
var genre = select.options[select.selectedIndex].text;
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{'genre':genre},
   success:function(data)
   {
    $('#wishlist').html(data);
   }
  });
 }

