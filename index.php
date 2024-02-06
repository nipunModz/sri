<form action="" method="POST">
  <button type="submit" name="submitButton">Click Me</button>
</form>

<?php
 // if (isset($_POST['submitButton'])) {
   // handleButtonClick();
 // }
//
 // function handleButtonClick(){
    //Declaring Static Variables
    $apiSecret = "84e36ea1-721c-4c67-a3e3-27b76ec06d5d"; //Put your API Secret here
    $apiKey = "0456382ad3b578f2636c362e07af4626"; //Put your API Key here
    $redirectURL = "https://www.modzlk.xyz"; //Put your redirection page URL here
    
    //Declaring Dynamic Variables

    $currentDateTime = date("Y-m-d H:i:s "); 
    $newDateTime = new DateTime($currentDateTime); 
    $newDateTime->setTimezone(new DateTimeZone("UTC")); 
   // $dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");
    $dateTimeUTC = $newDateTime->format('Y-m-d\TH:i:s.').substr (( string ) microtime () , 2 , 3) . "Z";




    
   // date_default_timezone_set('asia/colombo');
   // $current_time = date('Y-m-d\Th:i:s.').substr (( string ) microtime () , 2 , 3) . "Z";


   
//Building request ID. You may include your own logic here

$requestId ="" ;
for ( $i = 0; $i < 15; $i ++) {
$requestId .= mt_rand (0 , 9) ;
}

//Building request signature
$signatureData = $apiKey. "|". $dateTimeUTC."|" .$apiSecret;
$hashedSignature = hash('sha512',$signatureData);

//Building API endpoint
$apiEndpoint ="https://portal.ideamart.io/sdk/subscription/authorize?apiKey=".$apiKey."&requestId=".$requestId."&requestTime=".$dateTimeUTC."&signature=".$hashedSignature."&redirectUrl=".$redirectURL."";

//echo $apiEndpoint;
// Redirect to the API endpoint
header("Location: $apiEndpoint");
 // }
?>



