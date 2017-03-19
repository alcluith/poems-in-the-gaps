

/**********************************************************/
/*functions to load a new set of words if the text selected*/
/*changes on the drop down selector                       */
/**********************************************************/
function displayVals(pagenow) {
      var text_name = $( "#dropdown" ).val();
      console.log(text_name);
      // do the ajax get call to call display_page
  $.ajax({
 
    // The URL for the request
    url: "display_page.php",

    data:{
      page_num: pagenow,
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

// words.addEventListener('click', function(foo) {
//   console.log("clicked" + foo.target.id);
//   if( foo.target.tagName === 'SPAN') {
//      foo.target.classList.toggle('redacted'); 
//   }
// }, false);

      words.addEventListener('mousedown', function(bar) {
      if( bar.target.tagName === 'SPAN') {
     console.log("mousedown" + bar.target.id);
     dragstart = bar.target.id
     // bar.target.classList.toggle('redacted'); 
      }
      }, false);


      words.addEventListener('mouseup', function(wibble) {
      if( wibble.target.tagName === 'SPAN') {
        console.log("mouseup" + wibble.target.id);
      for(i = dragstart; i <= wibble.target.id; i++){
        document.getElementById(i).classList.toggle('redacted'); 
      }
     // bar.target.classList.toggle('redacted'); 
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

  

/**********************************************************/
/*functions show the next "page" of text in the current      */
/* text selected using the "next page" button              */
/**********************************************************/

$(document).ready(function(){
    $( "button" ).click(function(){
      console.log("button clicked");
    });
  });
