<?PHP

include_once("./CAS-1.6.2/CAS.php");
phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
// SSL!
phpCAS::setCasServerCACert("./cacert-2023-08-22.pem");//this is relative to the cas client.php file

if (phpCAS::isAuthenticated()){
  echo "User:" . phpCAS::getUser();
  echo "<a href='./logout.php'>Logout</a>";
}else{
  echo "<a href='./login.php'>Login</a>"; 
}
echo "this is some text";

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Duo Security Login</title>
  </head>
  <body>
    <h1>Duo Security Login</h1>
    <button id="duo-login-button">Log in with Duo Security</button>
    
  </body>
</html>