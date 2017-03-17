/////////////////////////////////////////////////////////////////////////////////////////////
//Globals
/////////////////////////////////////////////////////////////////////////////////////////////

var userSignedIn = 0;
var usernameString;
var picsArray;
picsArray = [];
var randomArray;
randomArray = [];

var randomValue = "";

var roundCounter = 1;

function signInUser(id){
  var u = $( "#usernameTextField").val();
  var g = $( "#passwordTextField").val();

  getPics();

  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              var foundUser =  xmlhttp.responseText;
              //prit output from php? Uncomment below
              alert(foundUser);
              //getPosts(linkName);



            }
        };
        xmlhttp.open("POST", "joinGame.php?u=" + u + "&g=" + g, true);
        xmlhttp.send();

}


function imageClicked (path) {

  var img = '<img src=' + path + ' style="width:100px;height:100px;">';
  
  $("#picToDisplay img:last-child").remove();
  var $jImage = $(img);
  $("#picToDisplay").append($jImage);

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


function getPics (id){
  var u = usernameString;
  $( "div" ).remove();



  showGalleryHtml = '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' +
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="addPictureButton">'+ 
                        '<button type="button" class="btn btn-lg btn-block btn-success" onclick="addGamePic(this)">Add Pic to Game!</button>'+
                      '</div>'+ 
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' + 
                    '</div>'+//row 1 end
                    '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' + 
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="orLabel">'+ 
                        'or'+
                      '</div>'+ 
                      '<div class="col-md-1 col-sm-1 col-xs-1" >'+ '</div>'+
                    '</div>' +//row 2 end
                     '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' +
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="GoToLoadingButton">'+ 
                        '<button type="button" class="btn btn-lg btn-block btn-success"  onclick="goToLoad(this)">Join Game Now!</button>'+
                      '</div>'+ 
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' + 
                    '</div>';//row 3 end

                    var $jshowGalleryHtml = $(showGalleryHtml);
                    $("body").append($jshowGalleryHtml);

 
}


function addGamePic(id){

}

function goToLoad(id){
  var u = usernameString;

  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                    '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                      'ROAST OFF!' +
                    '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="Loading1">' +'Loading' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'; //4th row ends
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);


  setTimeout(loadingLabel4, 0);
  setTimeout(loadingLabel1, 1000);
  setTimeout(loadingLabel2, 2000);
  setTimeout(loadingLabel3, 3000);
  setTimeout(loadingLabel4, 4000);
  var myVar = setInterval(myTimer, 4000);  //starts repeated timer

  setTimeout(enterRoastPage, 6000);

}

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


function enterRoastPage() {
  $( "div" ).remove();


var loginField;
  //add button in nav bar to go back to main 

  /* this commened out code refreshes the site when submit is clicked --> not the segue i want
        loginField ='<div class="row " >' +
                      '<div class="col-md-3 col-sm-3 col-xs-3">'+ '</div>' +
                      '<div class="col-md-6 col-sm-6 col-xs-6" id="PictureHere">'+ 
                      //PicHere
                      '</div>'+ 
                      '<div class="col-md-3 col-sm-3 col-xs-3">'+ '</div>' + 
                    '</div>'+//row 1 end
                    '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' +
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="TypeRoastHere">'+
                        '<form class="form-inline">'+
                        '<div class="form-group">'+
                          '<label class="sr-only" for="exampleInputPassword3">Enter Roast!</label>'+
                          //'<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">'+
                          '<textarea class="form-control" rows="3"></textarea>'+
                        '</div>'+
                        '<button type="submit" class="btn btn-default btn-success" onclick="waitToVote(this)">Submit!</button>'+
                      '</form>'+
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>'
                      '</div>'//row 2 end;
                      */
  loginField ='<div class="row " >' +
                      '<div class="col-md-3 col-sm-3 col-xs-3">'+ '</div>' +
                      '<div class="col-md-6 col-sm-6 col-xs-6" id="PictureHere">'+ 
                      //PicHere
                      '</div>'+ 
                      '<div class="col-md-3 col-sm-3 col-xs-3">'+ '</div>' + 
                    '</div>'+//row 1 end
                    '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' +
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="TypeRoastHere">'+
                          '<textarea class="form-control" rows="3"></textarea>'+
                      '</div>'+
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>'+
                    '</div>'+//row 2 end
                    '<div class="row " >' +
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' +
                      '<div class="col-md-10 col-sm-10 col-xs-10" id="GoToLoadButton">'+ 
                        '<button type="button" class="btn btn-lg btn-block btn-success"  onclick="waitToVote(this)">Submit Roast!</button>'+
                      '</div>'+ 
                      '<div class="col-md-1 col-sm-1 col-xs-1">'+ '</div>' + 
                    '</div>';//row 3 end;

  var $jloginField = $(loginField);
  $("body").append($jloginField);

  
}

function waitToVote() {
  var u = usernameString;

  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                    '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                      'ROAST OFF!' +
                    '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="Loading1">' +'Waiting' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'; //4th row ends
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);


  setTimeout(waitLabel4, 0);
  setTimeout(waitLabel1, 1000);
  setTimeout(waitLabel2, 2000);
  setTimeout(waitLabel3, 3000);
  setTimeout(waitLabel4, 4000);
  var myVar = setInterval(myTimer1, 4000);  //starts repeated timer

  setTimeout(goToVote, 6000);

}

function myTimer1() {
  setTimeout(waitLabel1, 1000);
  setTimeout(waitLabel2, 2000);
  setTimeout(waitLabel3, 3000);
  setTimeout(waitLabel4, 4000);
}

function waitLabel1() {
  document.getElementById("Loading1").innerHTML = "Waiting .";
}

function waitLabel2() {
  document.getElementById("Loading1").innerHTML = "Waiting ..";
}

function waitLabel3() {
  document.getElementById("Loading1").innerHTML = "Waiting ...";
}

function waitLabel4() {
  document.getElementById("Loading1").innerHTML = "Waiting";
}


function goToVote() {
  var u = usernameString;

  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                  '<table class="table table-bordered table-hover">'+
                      '<tr class="A">'+
                        '<td class="active">...</td>'+
                      '</tr>'+
                      '<tr class="B">'+
                        '<td class="info">...</td>'+
                      '</tr>'+
                      '<tr class="C">'+
                        '<td class="danger">...</td>'+
                      '</tr>'+
                      '<tr class="D">'+
                        '<td class="success">...</td>'+
                      '</tr>'+
                  '</table>'+
               '</div>'; 
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);


  $( "tr.A" ).on( "click", function( event ) {
  alert("you clicked A");
  voteAndWait("A");
  });

  $( "tr.B" ).on( "click", function( event ) {
  alert("you clicked B");
  voteAndWait("B");
  });

  $( "tr.C" ).on( "click", function( event ) {
  alert("you clicked C");
  voteAndWait("C");
  });

  $( "tr.D" ).on( "click", function( event ) {
  alert("you clicked D");
  voteAndWait("D");
  });

}

function voteAndWait(p1) {
  var choiceOfLetter = p1;
  //use ajax to upload vote


  //----------------------------------//
  //Aysnchonosly load page

  $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                    '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                      'ROAST OFF!' +
                    '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="Loading1">' +'Waiting' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'; //4th row ends 
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);

  setTimeout(displayPoints, 6000);

}

function displayPoints() {
//Winner!, 2nd Place, 3rd Place, 4th place ...
//4 votes!
//+200 points!

 $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                    '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                      'ROAST OFF!' +
                    '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="roundRanking" >' +'Winner!' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'+
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="roundVotes">' +'5 Votes!' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'+
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="roundPoints">' +'250 pts!' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'; //4th row ends 
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);

   roundCounter = roundCounter + 1;

 if (roundCounter < 4){
    setTimeout(enterRoastPage, 4000);
  }
  else{
    setTimeout(endScreen, 4000);
  }

}

function endScreen() {
//Winner!, 2nd Place, 3rd Place, 4th place ...
//4 votes!
//+200 points!

 roundCounter = 1;
 $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >' +
                    '<div id="TitleFrontPage" class="title extra-bottom-padding">' +
                      'ROAST OFF!' +
                    '</div>' +
                '</div>' +//1st row ends
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="roundRanking" >' +'3rd Overall' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'+
                '<div class="row " >' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-md-8 col-sm-8 col-xs-8" id="roundPoints">' +'550 pts' + '</div>' +
                    '<div class="col-md-2 col-sm-2 col-xs-2"></div>' +
                '</div>'; 
                

    var $jloginField = $(loginField);
  $("body").append($jloginField);

  setTimeout(restart, 4000);


}

function restart() {
//Winner!, 2nd Place, 3rd Place, 4th place ...
//4 votes!
//+200 points!

 $( "div" ).remove();

  var loginField;
  //add button in nav bar to go back to main 
  loginField = '<div class="row " >'+ 
                '<div class="col-md-1 col-sm-1 col-xs-1"></div>'+
                '<div class="col-md-10 col-sm-10 col-xs-10" id="title" >ROAST OFF!</div>'+
                '<div class="col-md-1 col-sm-1 col-xs-1"></div>'+
              '</div>  <!-- close row 1 -->'+
              '<div class="row " >'+  
                '<div class="col-md-1 col-sm-1 col-xs-1"></div>'+
                '<div id="signInDiv" class="col-md-10 col-sm-10 col-xs-10">'+
                  '<form id="sign_In_Form">'+
                      '<div class="form-group">'+
                          '<input type="text" name="username"  class="form-control"  id="usernameTextField" placeholder="Create Username!" >'+
                      '</div>'+
                      '<div class="form-group">'+
                          '<input type="text" name="password"  class="form-control"  id="passwordTextField" placeholder="Enter Join Code!" >'+
                      '</div>'+
                 '</form>'+
                 '<button type="button" class="btn btn-lg btn-block btn-success" onclick="signInUser(this)">Join Game!</button>'+
                 '<div class="col-md-1 col-sm-1 col-xs-1"></div>'+
                '</div>  <!-- close id="signInDiv" -->'+
              '</div>  <!-- close row 2 -->';

 var $jloginField = $(loginField);
  $("body").append($jloginField);        
       
}



