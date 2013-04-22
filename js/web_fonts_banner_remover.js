/* http://dannyscodesnippets.blogspot.com 2011 removing webfonts.fonts.com banner */  
  
/* when the document is ready start */  
$(document).ready(function(){  
   /* set variables */  
 var count,newcount;  
   /* count total divs loaded on the page */  
  count = $('div').length;  
 function checkwebFontDiv() {  
    /* count total divs loaded on the page */  
  newcount = $('div').length;  
    /* if the total divs has increased by 1 then continue */  
  if(newcount == count+1){  
     /* hide the last div (the fonts.com banner div) */  
   $('div:last').css("display","none");  
    /* otherwise check again */  
  } else {  
   setTimeout(checkwebFontDiv,5);   
  }  
 }  
   /* start checking for the new div */  
 checkwebFontDiv();  
}); 