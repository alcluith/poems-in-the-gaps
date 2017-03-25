
<html>
 <head>
  <title>Poems in the Gaps</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=EB+Garamond" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/blackout.js"></script>
  <script src="js/html2canvas.js"></script>
  <script>
  var current_page = 0;

  function displayVals(this_page) {
  var text_name = $( "#dropdown" ).val();
  console.log(text_name);
  console.log("currentpage is " + this_page);
  // do the ajax get call to call display_page now
  $.ajax({

      // The URL for the request
      url: "display_page.php",

      data:{
        page_num: this_page,
        current_text: text_name
      },
   
      // Whether this is a POST or GET request
      type: "GET",
   
      // The type of data we expect back
      dataType : "html",
    })
  // Code to run if the request succeeds (is done);
  // The response is passed to the function
    .done(function( data) {
      console.log("doing stuff!" + data);
      $('#textpage').html(data);
      console.log("init blackout");
      var words = document.querySelector("p");
      console.log(document.querySelector("p"));
      var dragstart = 0;
      var dragging = false;

      words.addEventListener('mousedown', function(bar) {
       if( bar.target.tagName === 'SPAN') {
         console.log("mousedown" + bar.target.id);
         dragstart = bar.target.id;
         dragging = true;
        }
      }, false);


      words.addEventListener('mouseup', function(wibble) {
      if( wibble.target.tagName === 'SPAN') {
        if (dragging) {
            console.log("mouseup" + wibble.target.id);
            for(i = dragstart; i <= wibble.target.id; i++){
                document.getElementById(i).classList.toggle('redacted'); 
                }
            dragging = false;
            }
      }
    }, false);
  })
  // Code to run if the request fails; the raw request and
  // status codes are passed to the function
  .fail(function( xhr, status, errorThrown ) {
    alert( "Sorry, there was a problem!" );
    console.log( "Error: " + errorThrown );
    console.log( "Status: " + status );
    console.dir( xhr );
  })
  // Code to run regardless of success or failure;
  .always(function( xhr, status ) {
    console.log( "The request is complete!" );
  });

  }

// display a default page on load
 $( window ).on( "load", function() {
        console.log( "window loaded" );
        displayVals(0);
    });
  

//display new text from the beginning when selected
  $(document).ready(function(){
      $( "select" ).change(function(){
        current_page = 0;
        displayVals(current_page) });
  });

//display next page  in current text when clicked
  $(document).ready(function(){
    $( "button" ).click(function(){
        console.log("button clicked: " + this.id);
        if ((this.id == 'prevbutton')) {
          if (current_page > 0){
            current_page = current_page - 1;
            console.log("prev button clicked, page now: " + current_page);
            displayVals(current_page);
            }
          }
        else {
        current_page = current_page +1;
        console.log("next button clicked, page now: " + current_page);
        displayVals(current_page);
    }
   });
  });

 </script>
 </head>
 <body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Poems in the Gaps</a></li>
      <li><a href="makeapoem.php">Make a poem</a></li>
      <li><a href="credits.html">About</a></li>
      <!-- <li><a href="#">Page 3</a></li> -->
    </ul>
  </div>
</nav>

<div id="instructions">
 Click on a word to black it out; click again to reveal it.<br/> Click and drag to blackout/reveal several words or lines (occasionally a bit temperamental).
  
</div>

Select text to work with: 
  <select id="dropdown">
    <option value="tides">Time and Tide: Robert S. Ball</option>
    <option value="frank">Frankenstein: Mary Wollstoncraft Shelley</option>
    <option value="dream">Dream Psychology: Sigmund Freud</option>
    <option value="music">Shakespeare and Music: Christopher Wilson</option>
    <option value="unix">The Art of Unix Programming: Eric Steven Raymond </option>
    <option value="alchemy">The Story of Alchemy and the Beginnings of Chemistry: M. M. Pattison Muir</option>
    <option value="trees">Hardy Ornamental Flowering Trees and Shrubs: Angus Duncan Webster</option>
    <option value="super">Astounding Stories of Super-Science: Various</option>
    
  </select>

<!-- <button id="randombutton" type="button">
    random page
  </button>
 -->

<button id="prevbutton" type="button">
    prev page
  </button>

<button id="nextbutton" type="button">
    next page
</button>


  <!-- display page -->

  <div id="textpage">
  </div>

  
 </body>
</html>