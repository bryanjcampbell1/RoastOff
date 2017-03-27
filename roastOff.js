/////////////////////////////////////////////////////////////////////////////////////////////
//Globals
/////////////////////////////////////////////////////////////////////////////////////////////

var userSignedIn = 0;
var usernameString;
var picsArray;
picsArray = [];

var RoundRankArray = [];
var RoundPointsArray = [];

 //var should be set from an array of submitted roasts
var roast1 = "Who am I?  A hiphop Asian teenager.";
var roast2 = "Ity looks like you couldnt throw a rock passed your dick.";
var roast3 = "It looks like you can smell that you're dying";
var roast4 = "Everybody deserves respect and dignity. Even this looser";
var roast5 = "Everybody deserves respect and dignity. Even this looser";
var RoastsArray = [roast1,roast2,roast3,roast4,roast5];

var roundCounter = 1;

var joinCode;

//var should be set from an array of submitted roasts



//--------------------------------------------------------------------------------//

  //Main Thread

//--------------------------------------------------------------------------------//

function signInButton (id) {
  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div id="TitleFrontPage" class="title extra-bottom-padding">'+
                '<font >Sign In!</font>'+
              '</div>'+
              '<div class="col-md-3"></div>' + //open and close 3 spacer
               '<div class="col-md-6">'+ //open 6 block
                '<div id="loginBlock" >'+ //open login block
                  '<form id="sign_In_Form">'+
                    '<div class="form-group">'+
                        '<input type="text" name="username"  class="form-control"  id="usernameTextField" placeholder="Username" >'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<input type="text" name="password"  class="form-control"  id="passwordTextField" placeholder="Password" >'+
                    '</div>'+
                   '</form>'+
                   '<div class="col-md-3"></div>' + //open and close 3 spacer
               '<div class="col-md-6">'+ //open 6 block
                   '<button type="button" class="btn btn-lg btn-block btn-success" onclick="signInUser(this)">Sign In</button>'+
                   '</form>'+'<div class="col-md-3"></div>' + 
                '</div>'+ //close login block
                '</div>'+ //close 6 block
                '<div class="col-md-3"></div>'; // open and close  spacer

  var $jloginField = $(loginField);
 $("body").append($jloginField);

//hen signInUser is triggered 
//1) php runs and checks username and pasword
//2) if (success) --> take user to a Welcome screen with a "start game" button
//3)


}

function signInUser(id){
  var u = $( "#usernameTextField").val();
  var p = $( "#passwordTextField").val();

  //query database for user data and check for match
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;
              
              if (foundUser == "TRUE" ) {
                usernameString = u;
                userSignedIn = 1;

                welcomePage();
               // startPage ();
                
                }
                else{
                 alert("Username and Password do not match");
                }
              
              }
              else{
                //alert("Could not connect to account. Try again later.");
              }
            
        };
        xmlhttp.open("GET", "SignIn.php?u=" + u + "&p=" + p, true);
        xmlhttp.send();
      
}


function welcomePage (id) {
  $( "div" ).remove();

  var loginField;
  
  loginField = '<div class="row " >' +
                  '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                    'ROAST OFF!' +
                  '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-4"></div>' +
                    '<div class="col-md-4">' +
                      '<button type="button" class="btn btn-success btn-lg btn-block signInButton extra-bottom-padding"  onclick="createGame(this)">Start Game</button>'+
                    '</div>'+
                    '<div class="col-md-4"></div>' +
                '</div>'; 

    var $jloginField = $(loginField);
  $("body").append($jloginField);

}

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

function createGame (id) {
  var gameId = makeid();
  joinCode = gameId;
  //alert(gameId);
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;
              //prit output from php? Uncomment below
              //alert(foundUser);
              startPage();
              
            }
        };
        xmlhttp.open("POST", "createNewGame.php?g=" + gameId, true);
        xmlhttp.send();

}

function startPage (id) {
  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                  '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                    'ROAST OFF!' +
                  '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                  '<div id="SignJoinBlock">' +
                    '<div class="col-md-4"></div>' +
                    '<div class="col-md-4" id="Loading1">' +
                      'Loading' +
                    '</div>' +
                    '<div class="col-md-4"></div>' +
                '</div>' +//2nd row ends
                '<div class="row">' +
                  '<div class="col-md-3"></div>' +
                  '<div class="col-md-6" id="JoinCode">' +
                    'Join Code: '+ joinCode +
                  '</div>' +
                  '<div class="col-md-3"></div>'+ 
                '</div>'  + //3rd row ends  
               '<div class="row">' +
                  '<div class="col-md-1"></div>' +
                  '<div class="col-md-10 rounded" id="mobileWebsite">' +
                    'Mobile go to '+'www.kingsnackmangames.com/ROASTOFF' +
                  '</div>' +
                  '<div class="col-md-1"></div>'
                '</div>'; //4th row ends
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);

/*

  setTimeout(loadingLabel4, 0);
  setTimeout(loadingLabel1, 1000);
  setTimeout(loadingLabel2, 2000);
  setTimeout(loadingLabel3, 3000);
  setTimeout(loadingLabel4, 4000);
  var myVar = setInterval(myTimer, 4000);  //starts repeated timer
  //setTimeout(clearInterval(myVar), 10000); //check if this stops timer after 10 s
*/


//improvement could be a button that is pressed to segue to start the game
//instead of a timer

//replace timed segue by button


//setTimeout(clearDivs, 6000);
  setTimeout(chooseGamePics, 6000);
}


function chooseGamePics(id) {

  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;
              //prit output from php? Uncomment below
              //alert(foundUser);
              getPics();

            }
        };
        xmlhttp.open("POST", "chooseGamePics.php?g=" + joinCode, true);
        xmlhttp.send();
}

function getPics (id){

  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;

               picsArray  =  $.parseJSON(xmlhttp.responseText);

               clearDivs() ;

            }
        };
        xmlhttp.open("GET", "GetPics.php?g=" + joinCode, true);
        xmlhttp.send();
        
}

function clearDivs() {
  $( "div" ).remove();

  var loginField;

  //alert(picsArray[0]);
  //alert(picsArray[1]);
  //alert(picsArray[2]);

  loginField ='<div class="col-md-4" id="RoundOne">'+
                '<font >ROUND ' + roundCounter + '</font>'+
              '</div>' + 
               '<div class="col-md-4" id="RoastPicHere">'+ 
               '<div id="pictureFrame" >'+
               '<img src=' + picsArray[roundCounter -1] +' style="width:350px;" hspace="20">'+
              '</div>'+ 
              '</div>'+ 
              '<div class="col-md-4" id="counter">'+
              '</div>'+
                '<div class="col-md-12 rounded" id="sickBurn" >Use your phone to enter your sick burn!</div>'; 

  var $jloginField = $(loginField);
 $("body").append($jloginField);

  jQuery(function ($) {
    var fiveMinutes = 60 * .2,
        display = $('#counter');
    startTimer(fiveMinutes, display);
  });


  //setTimeout(showRoasts, 60*.2*1000);
    setTimeout(GetRoasts, 60*.2*1000);

}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

function GetRoasts (id) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

               RoastsArray  =  $.parseJSON(xmlhttp.responseText);

               showRoasts() ;

            }
        };
        xmlhttp.open("GET", "GetRoasts.php?g=" + joinCode, true);
        xmlhttp.send();


}

function showRoasts (id) {
  $( "div" ).remove();

/*
  roast1 = "A) " + roast1;
  roast2 = "B) " + roast2;
  roast3 = "C) " + roast3;
  roast4 = "D) " + roast4;
*/

  roast1 = "A) " + RoastsArray[1];
  roast2 = "B) " + RoastsArray[2];
  roast3 = "C) " + RoastsArray[3];
  roast4 = "D) " + RoastsArray[4];
  roast5 = "E) " + RoastsArray[5];

var allRoasts = roast1 +'<br>' + roast2 +'<br>'+ roast3 +"<br>" + roast4;



  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="col-md-4" id="RoundOne">'+
                '<img src=' + picsArray[roundCounter -1] +' style="width:350px;" hspace="20">'+
              '</div>' +
               '<div class="col-md-7 rounded" id="roastText">'+ 
               roast1+
               '</div>'; 

  var $jloginField = $(loginField);
  $("body").append($jloginField)


//use jQuery instead to fade in roastText
  var t1 = setTimeout(function(){ document.getElementById("roastText").innerHTML = roast2; }, 3000);
  var t2 = setTimeout(function(){ document.getElementById("roastText").innerHTML = roast3; }, 6000);
  var t3 = setTimeout(function(){ document.getElementById("roastText").innerHTML = roast4; }, 9000);
  var t4 = setTimeout(function(){ document.getElementById("roastText").innerHTML = roast1 +'<br>' + roast2 +'<br>'+ roast3 +"<br>" + roast4; }, 12000);

//segue should ralistically be triggered by votes coming in 
  setTimeout(GetRoundWinner, 14000);

}

function GetRoundWinner (id) {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

               RoundRankArray  =  $.parseJSON(xmlhttp.responseText);

               showRoundWinner() ;

            }
        };
        xmlhttp.open("GET", "GetRoasts.php?g=" + joinCode, true);
        xmlhttp.send();


}

function showRoundWinner (id) {
  $( "div" ).remove();


  var round = "";
  var points = 150;

  if(roundCounter == 1){
    round = "Round One";
  }
  else if(roundCounter == 2){
    round = "Round Two";
  }
  else if(roundCounter == 3){
    round = "Round Three";
  }


  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                 '<div class="col-md-2">'+ '</div>' +
                 '<div class="col-md-8" id="roundName1">'+ 
                    round+
                 '</div>'+
                 '<div class="col-md-2">'+ '</div>' + 
              '</div>'+//row 1 end
              '<div class="row " >' +
                '<div class="col-md-2">'+ '</div>' + 
                '<div class="col-md-8" id="roundWinner">'+ 
                  RoundRankArray[0]+"Wins!"+
                '</div>'+ 
                '<div class="col-md-2" >'+ '</div>'+
              '</div>'+ 
              '<div class="row " >' +
                '<div class="col-md-2">'+ '</div>' + 
                '<div class="col-md-8" id="pointsLabel">'+ 
                  "+"+RoundPointsArray[0] +"POINTS!"+
                '</div>'+ 
                '<div class="col-md-2" >'+ '</div>'+
              '</div>';

  var $jloginField = $(loginField);
 $("body").append($jloginField);

 roundCounter = roundCounter + 1;

 if (roundCounter < 4){
    setTimeout(clearDivs, 4000);
  }
  else{
    setTimeout(endScreen, 4000);
  }

}

function endScreen (id) {
  $( "div" ).remove();

  roundCounter = 1;

  var loginField;
  //add button in nav bar to go back to main 
  /*
  loginField = '<div class="row">'+
                    '<div class="col-md-8" id="gameName1">'+ 
                       "WINNER!"+
                    '</div>'+ 
                '</div>'+
                '<div class="row">'+
                    '<div class="col-md-2">'+ '</div>'+ 
                    '<div class="col-md-8" id="gameWinner">'+ "kingsnackman"+"!"+'</div>'+ 
                    '<div class="col-md-2" id="counter">'+ '</div>'+
                '<div class="row">'+ 
                    '<div class="col-md-3"></div>' + 
                    '<div class="col-md-6">'+ 
                        '<button type="button" class="btn btn-lg btn-block btn-success" onclick="startPage(this)">Start New Game</button>'+
                    '</div>'+
                    '<div class="col-md-3"></div>' + 
                '</div>'  ;
                */

  loginField = '<div class="row " >' +
                 '<div class="col-md-2">'+ '</div>' +
                 '<div class="col-md-8" id="gameName1">'+ 
                       "WINNER!"+
                '</div>'+ 
                 '<div class="col-md-2">'+ '</div>' + 
              '</div>'+//row 1 end
              '<div class="row " >' +
                '<div class="col-md-2">'+ '</div>' + 
                '<div class="col-md-8" id="gameWinner">'+ "kingsnackman"+"!"+'</div>'+ 
                '<div class="col-md-2" >'+ '</div>'+
              '</div>'+ 
              '<div class="row " >' +
                '<div class="col-md-2">'+ '</div>' + 
                '<div class="col-md-8" id="pointsLabel">'+ 
                  "+"+"150" +"POINTS!"+
                '</div>'+ 
                '<div class="col-md-2" >'+ '</div>'+
                '</div>'+
                '<div class="row">'+ //button
                    '<div class="col-md-3"></div>' + 
                    '<div class="col-md-6">'+ 
                        '<button type="button" class="btn btn-lg btn-block btn-success" id="newGameButton" onclick="createGame(this)">Start New Game</button>'+
                    '</div>'+
                    '<div class="col-md-3"></div>' + 
                '</div>' ;

  var $jloginField = $(loginField);
 $("body").append($jloginField);
 

 }


//--------------------------------------------------------------------------------//

  //Join Thread

//--------------------------------------------------------------------------------//

function Join (id) {
  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div id="TitleFrontPage" class="title extra-bottom-padding">'+
                '<font >Create an Account!</font>'+
              '</div>'+
              '<div class="col-md-3"></div>;' + //open and close 3 spacer
               '<div class="col-md-6">'+ //open 6 block
                '<div id="loginBlock" >'+ //open login block
                  '<form id="sign_In_Form">'+
                    '<div class="form-group">'+
                        '<input type="text" name="username"  class="form-control"  id="usernameTextField" placeholder="Username" >'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<input type="text" name="password"  class="form-control"  id="passwordTextField" placeholder="Password" >'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<input type="text" name="emailTextFieldSU"  class="form-control"  id="emailTextField" placeholder="Email" >'+
                    '</div>'+
                   '<div class="col-md-3"></div>;' + //open and close 3 spacer
               '<div class="col-md-6">'+ //open 6 block
                   '<button type="button" class="btn btn-lg btn-block btn-success" onclick="signUpUser(this)">Join</button>'+
                   '</form>'+'<div class="col-md-3"></div>;' + 
                '</div>'+ //close login block
                '</div>'+ //close 6 block
                '<div class="col-md-3"></div>'; // open and close  spacer

  var $jloginField = $(loginField);
 $("body").append($jloginField);

}

function signUpUser(id){


  //get username and password from form
  var u = $( "#usernameTextField").val();
  var p = $( "#passwordTextField").val();
  var e = $( "#emailTextField").val();

    alert(e);

  //query database for user data and check for match
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;
              //prit output from php? Uncomment below
              alert(foundUser);
              
            }
        };
        xmlhttp.open("POST", "signUp.php?u=" + u + "&p=" + p + "&e=" + e, true);
        xmlhttp.send();

}


function imageClicked (path) {

  var img = '<img src=' + path + ' style="width:170px;" hspace="20">';
  //var img = '<img src=' + path + ' >';
  
  $("#picToDisplay img:last-child").remove();
  var $jImage = $(img);
  $("#picToDisplay").append($jImage);

  //var checkedValue = $('#rCheckbox:checked').val();
 $('#rCheckbox').prop('checked', false);

  var str = path;
  str = str.substring(str.indexOf("keepPicsHere") );
  //alert(str);

  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //do nothing
              var xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.onreadystatechange = function() {
               if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {


              }
            };
            xmlhttp2.open("POST", "setDisplayPick2.php?userame=" + usernameString + "&path=" + str, true);
            xmlhttp2.send();

            }
        };
        xmlhttp.open("POST", "setDisplayPick.php?userame=" + usernameString + "&path=" + path, true);
        xmlhttp.send();
        //this php file mustt

}  




function randomize(id) {
  var cbv;
//use value = 1 for normal 
//value = -1 for randomize

//need to set jquery to watch checkbox for change
  var checkedValue = $('#rCheckbox:checked').val();
//alert("here");
//alert(checkedValue);

  if(checkedValue == "1"){
    cbv = "1";
    var img = '<img src="questionmark.png" style="width:170px;" hspace="20">';
  
    $("#picToDisplay img:last-child").remove();
    var $jImage = $(img);
    $("#picToDisplay").append($jImage);

  }
  else{
  //alert("-1");
  cbv = "0";
  $("#picToDisplay img:last-child").remove();
  }

  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //do nothing

            }
        };
        xmlhttp.open("POST", "randomize.php?username=" + usernameString+ "&checkboxValue=" + cbv, true);
        xmlhttp.send();


}


function selectPic (id){
  //grab file from #file
  var f = $("#file")[0].files[0];

  var data = new FormData();
  
  jQuery.each(jQuery('#file')[0].files, function(i, file) {
    data.append('file-'+i, file);
    });

  jQuery.ajax({
    url: "seeMeAddPic.php?u=" + usernameString,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success: function(data){
        showGalleryPage();
    }
  });


function myTimer() {
  setTimeout(loadingLabel1, 1000);
  setTimeout(loadingLabel2, 2000);
  setTimeout(loadingLabel3, 3000);
  setTimeout(loadingLabel4, 4000);
}

function loadingLabel1() {
  document.getElementById("Loading1").innerHTML = "Loading .";
}

function loadingLabel2() {
  document.getElementById("Loading1").innerHTML = "Loading ..";
}

function loadingLabel3() {
  document.getElementById("Loading1").innerHTML = "Loading ...";
}

function loadingLabel4() {
  document.getElementById("Loading1").innerHTML = "Loading";
}

  /* //for older browsers --> use FormData Emulation
  var opts = {
    url: 'php/upload.php',
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success: function(data){
        alert(data);
    }
};
if(data.fake) {
    // Make sure no text encoding stuff is done by xhr
    opts.xhr = function() { var xhr = jQuery.ajaxSettings.xhr(); xhr.send = xhr.sendAsBinary; return xhr; }
    opts.contentType = "multipart/form-data; boundary="+data.boundary;
    opts.data = data.toString();
}
jQuery.ajax(opts);
  */

}




//Notes
//RandCheck checked then select a pic from gallery ---> checkbox needs to uncheck

//joincode should change on a new game

//create new variables to store users points 


