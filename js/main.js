var res;

$(document).ready(()=> {
	$('#searchForm').on('submit', (e)=> {
	  let searchText=$('#searchText').val();
      getMovies(searchText);
      e.preventDefault();
   });   
   
});

function getMovies(searchText){
	/*console.log(searchText);*/
   axios.get('http://www.omdbapi.com/?apikey=c5c1ebdb&s='+searchText)
   
      .then((response)=> {
         console.log(response);
         let movies = response.data.Search;
         let output=' ';
         $.each(movies, (index, movie) => {
            output +=`
               
			   <div class="col-md-3">
                  <div class="well text-center">
                     <img src="${movie.Poster}">
                     <h5>${movie.Title}</h5>
                     <a onclick="movieSelected('${movie.imdbID}')" class="btn btn-primary" href="movie.php">Λεπτομέρειες</a>
                  </div>
               </div>
			   
            `;   
         });
         
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
            <div class="col-md-4">
			 <img src="${movie.Poster}" class="thumbnail">
            </div>
			<div class="col-md-8">
			   <h2>${movie.Title}</h2>
			      <ul class="list-group">
				     <li class="list-group-item" id="genre"> <strong>Κατηγορία :</strong> ${movie.Genre} </li>
					 <li class="list-group-item" > <strong>Κυκλοφορία :</strong> ${movie.Released} </li>
					 <li class="list-group-item"> <strong>Σκηνοθέτης :</strong> ${movie.Director} </li>
					 <li class="list-group-item"> <strong>Ηθοποιοί :</strong> ${movie.Actors} </li>
					 <li class="list-group-item"> <strong>Περιγραφή :</strong> ${movie.Plot} </li>
				  </ul>
            </div>
        </div>
		<div class="row">
		   <div class="well">
		 <br>
		   <h6>Περιγραφή</h6>
		   <br>
		      ${movie.Plot} &nbsp;&nbsp;&nbsp; 
			 <a href="https://www.imdb.com/title/${movie.imdbID}/" target="_blank" class="btn btn-primary">View IMDB</a>
			 &nbsp;&nbsp;&nbsp;&nbsp;
			  <a href="index.php" class="btn btn-primary">Επιστροφή...</a>&nbsp;&nbsp;&nbsp;&nbsp;`;
              if (param){
         
                  output+=`<button id="" class="btn btn-primary" onclick="saveMovie()">Προσθήκη στην λίστα</button></div></div>`
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
                  output+=`</div></div>`;
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
		if(data="Already liked"){
		alert("Already liked");
		}else{
		$('#msg_box').text(data);
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
			var i = r.parentNode.parentNode.rowIndex;
			document.getElementById("data-table").deleteRow(i);
		})
		.fail(function(jqXHR, exception) {
			console.log(exception);
		});
}


