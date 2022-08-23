<!-- tenary operators -->
 <!-- Tenary operator is the same as the if statement but in this case, we write the everything on one line -->

<?php 
$score = 50;

// if($score > 40){
//     echo 'high score';
// } else {
//     echo ' low score';
// }

     //echo $score > 40? 'high score' : 'low score';


 //superglobals
//  $_GET and $_POST

// $_SERVER  contains all the information about the server
// make sure to always use capital letters in the global server
// echo $_SERVER['SERVER_NAME']   . '<br/>';  
// echo $_SERVER['REQUEST_METHOD'] . '<br/>';
// echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';
// echo $_SERVER['PHP_SELF'] . '<br/>';  //gives the current page of the file

//$_SESSION 
    // sessions is used to carry a variable from one page to the other.
    //session does not store data on the computer but it stores data on the servernbtn loading different pages
    if(isset($_POST['submit'])){


        //cookie for gender
        setcookie('gender', $_POST['gender'], time() + 86400 , "/");  //gender is the name,  $_POST['gender']is the value

        session_start(); //displays the data or info in the server

        $_SESSION['name'] = $_POST['name'];   //storing the name in a super variable called session

         //echo $_SESSION['name'];

        header('Location: http://localhost:8080/ninja/PROJECTS/');
    }


//$_COOKIE

  //stored on the user's computer

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title[>php tuts</title>
</head>
<body>

<p><?php  echo $score > 40? 'high score' : 'low score';?></p>
    
<!-- applying the session -->
<form action ="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
   <input type="text" name="name">
   <select name="gender">
    <option value="male"> male </option>
    <option value="female"> female </option>
   </select> <br/><br/> 
   <input type ="submit" name="submit" value="submit">  
</form>
</body>
</html>