
/**********************************************************/
/*functions to load a new set of words if the text selected*/
/*changes on the drop down selector                       */
/**********************************************************/

/**********************************************************/
/*functions show the next "page" of text in the current      */
/* text selected using the "next page" button              */
/**********************************************************/



/**********************************************************/
/*functions to show and hide the text of the current "page"*/
/**********************************************************/
function initBlackout(){
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
}


