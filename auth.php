<?php
$client_id = '3m4yrd7fyyqs10ahrsn9isdhn85jne';
$redirect_uri = 'https://www.liamrawsthorne.com/triviatricks/auth.php/';
$response_type = 'code';
$scope = 'chat:read';


$auth_token = "https://id.twitch.tv/oauth2/authorize?response_type=" . $response_type . "&client_id=" . $client_id . "&scope=" . $scope . "&redirect_uri=" . $redirect_uri ;


//echo ($auth_token);
// replace with redirect

//echo ("<a href='" . $auth_token ."'>Authorize</a>");


if(isset($_GET["code"])){
	$user_code = $_GET["code"];
	}

$client_secret = 'e1734xt2uag5nk6mff51a9wvckzz27';
$code = $user_code;
$grant_type = 'authorization_code';


  $parameterValues = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri,
    'code' => $code
  );

  $postValues = http_build_query($parameterValues, '', '&');


  $ch = curl_init();
    
  curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://id.twitch.tv/oauth2/token',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $postValues
  ));
            
  $data = curl_exec($ch);
  $response = json_decode($data, true);
  //var_dump($response);
  $access_token = $response["access_token"];
  $refresh_token = $response["refresh_token"];
  $expires_in = $response["expires_in"];
  $scope_details = $response["scope"];
  $token_type = $response["token_type"];
  curl_close($ch);

  //echo ("<br />");
  //echo ("<br />");
  //echo ("Access Token: " . $access_token . "<br />");
  //echo ("<h3>Rest of data if needed</h3>");
  //echo ("Refresh Token: " . $refresh_token . "<br />");
  //echo ("Expires In: " . $expires_in . "<br />");
  //echo 'Scope: '.implode('", "', $scope_details).'<br />';
  //echo ("Token Type: " . $token_type . "<br />");
  
?>

<!DOCTYPE>
<html style='background-color: #6e40b1;'>
<head>
    <link rel="stylesheet" type="text/css" href="/triviatricks/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="shortcut icon" href="assets/images/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#3396ff">

</head>


<div id='body' class='px-md-5 px-sm-0 px-0 pt-sm-5 pt-0 authbody' onload='myRedirect();'>


    <div class='container-xl auth text-center p-5 pt-5 shadow rounded'>
        <h2>Authorization Code</h2>
        <div class='row'>
        <div class='col-12'>
            <div class="input-group mb-3">
              
              <input readonly type="password" id="accessid" class="form-control access-input text-center" value="<?php echo $access_token ?>" aria-label="access" aria-describedby="access-code"></input>

              <div class="input-group-prepend eyei" id='eyei'>
                <span class="input-group-text eye bi bi-eye" onclick="myFunction()" id="eyecopy">
                <br /></span>
              </div>

              <div class="input-group-prepend ml-2 clipi" id='clip'>
                <span class="input-group-text eye bi bi-clipboard-plus text-white" id="clipboard">
                <br /></span>
              </div>
            </div>
        </div>
        </div>

        <div class="toast mx-3 mr-md-5 mb-5 px-4 py-2" id="myToast" data-autohide="true" data-delay="4000">
    
        <div class="toast-body">
          Your authorization code has been copied!
        </div>
    </div>

    
    
  </div>

</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

<script>
$(function myFunction(){
  $('#eyecopy').click(function(){
       
        if($(this).hasClass('bi-eye-slash')){
          $(this).removeClass('bi-eye-slash');
          $(this).addClass('bi-eye');
            
        }else{$(this).removeClass('bi-eye'); 
          $(this).addClass('bi-eye-slash');  
        }

        var x = document.getElementById("accessid");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          } 
            });
});


function copyFunction() {		  
  var copyText = document.getElementById("accessid");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
};

$(document).ready(function(){
	$(".clipi").click(function(){
		if($("#eyecopy").hasClass('bi-eye')){
		$("#eyecopy").removeClass('bi-eye');
		$("#eyecopy").addClass('bi-eye-slash');
		
		var x = document.getElementById("accessid");
          if (x.type === "password") {
            x.type = "text";
		  }
		}

		copyFunction();
		$("#myToast").toast('show');
	});
});
</script>
</body>
</html>