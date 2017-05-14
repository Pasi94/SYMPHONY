/*Jquerey toggles*/
$(document).ready(function(){
    $("#flip").click(function(){
	$("#panel3").slideUp(500);
	$("#panel2").slideUp(500);
	$("#panel1").slideUp(500);	
	$("#panel").slideToggle(1000);
    });
});

$(document).ready(function(){
    $("#flip1").click(function(){
		$("#panel3").slideUp(500);
		$("#panel2").slideUp(500);
		$("#panel").slideUp(500);
        $("#panel1").slideToggle(1000);
    });
});

$(document).ready(function(){
    $("#flip2").click(function(){
        $("#panel2").slideToggle(1000);
    });
});

$(document).ready(function(){
    $("#flip3").click(function(){
        $("#panel3").slideToggle(1000);
    });
});


/*carousel interval speed been reduced by 2000*/
$('.carousel').carousel({
  interval: 3000
})

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});


/* random number generator for user_id (database primarykey) */
function randomStr(m) {
	var m = m || 9; s = '', r = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	for (var i=0; i < m; i++) { s += r.charAt(Math.floor(Math.random()*r.length)); }
	return s;
};
document.getElementById("user_id").value = randomStr(15);

function searchRes(str) {
  if (str.length==0) { 
    document.getElementById("pkID").innerHTML="";
    document.getElementById("pkID").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("pkID").innerHTML=xmlhttp.responseText;
      document.getElementById("pkID").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
}


/*mandeera*/
/*comment form validation*/
function validate(){
	if(document.comment.update.value == "yes" && document.comment.email.value == ""){
		alert("Please enter E-mail address");
		document.comment.email.focus();
		return false;
	}
	return (true);
}
	
function validateEmail(){
   var emailID = document.comment.email.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
       alert("Please enter correct email ID")
       document.comment.email.focus() ;
       return false;
   }
   return( true );
}

function myFunction(){
	var rate = document.comment.rate.value;
	rate = document.forms[0];
	var txt = "";
	var nme = document.comment.name.value;
	var mail = document.comment.email.value;
	var cmnt = document.comment.comnt.value;
	if(document.comment.name.value == null || document.comment.name.value == "" ){
			alert("Please make sure you have filled the form correctly")
			document.comment.name.focus();
			return false;
			}
			if(document.comment.rate.value == null){
				document.comment.rate.focus();
				}
			if( document.comment.comnt.value == null || document.comment.comnt.value == "" ){
				alert("Please make sure you have filled the form correctly")
				document.comment.comnt.focus();
				return false;
				}
			else{}
	for(i=0; i<rate.length; i++){
		if(rate[i].checked){
			txt = rate[i].value + "";
			nme = nme;
			mail = mail;
			cmnt = cmnt;
			}
		}
		document.getElementById("pname").value = " " +nme;
		if(document.comment.update.value == "yes"){
			document.getElementById("pmail").value = " " +mail;
			}
		document.getElementById("prate").value = " " +txt;
		document.getElementById("pcomment").value = " " +cmnt;
		
		
	}
	/*end of comment form validations*/
	
	/*questionnaire*/
	function qvalidate(){
			if(document.getElementById("q1").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q2").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q3").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q4").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q5").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q6").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q7").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q8").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q9").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else if(document.getElementById("q0").checked = false){
				alert("Please make sure that you don't leave any questions unanswered")
				return false;
			}
			else{
				return true;
				}
	}

/*end of mandeera's*/

/* Navindu 1212*/


var myCenter=new google.maps.LatLng(6.865137,79.859829);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);


marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"Hello there!!!!"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
