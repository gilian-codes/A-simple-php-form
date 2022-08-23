<?php

include('config/db_connect.php');


//if data is sent to us , we need to get that data ,  do something with it before the page is sent back 
//if no data is sent to us , we simply don't anything and display the page back

//if(isset())    //checks if a certain value has been set to us

$title = $email = $ingredients = ''; // ingredients equals to empty strings
$errors = array('email' =>'', 'title'=>'', 'ingredients'=>'');   //ensures that the errors are displayed in the form


if(isset($_POST['submit'])){        //checks if a any value has been send to us via the get method
      //  echo $_POST['email'];        //the email, title, ingredients is going to be stored in the get array
      //  echo $_PO ST['title'];
      //  echo $_POST['ingredients'];
      //the  echo $_GETS['email']; extracts the data which was sent to the browser in the url
      //they are called globals                     

//check email
if(empty($_POST['email'])){
  // echo 'An email is required <br />';
  $errors['email'] = 'email must be a valid email address';

} else{
   //echo htmlspecialchars($_POST['email']);
   $email = $_POST['email'];    //storing the email submitted in a variable called email
  // FILTERS AND  MORE VALIDATION
      // to determine if the email which the user entered is exactly an email with a .com at the end
      // functions and some regular expressions are used to validate both  the title and the ingredients
   //checkinf if it atually an email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      //echo ' email must be a valid email address';
      $errors['email'] = 'email must be a valid email address';
    }
}

//check title
if(empty($_POST['title'])){
 //  echo 'A title is required <br />';
 $errors['title']= 'Title must be letters and  space only';

} else{
   //echo htmlspecialchars($_POST['title']);
   $title = $_POST['title'];
if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {//preg_match is used to match something to a regular expression
      //echo 'Title must be letters and  space only';
      $errors['title']= 'Title must be letters and  space only';

  }
}

if(empty($_POST['ingredients'])){
   //echo 'Atleast one ingredient is required <br />';
   $errors['ingredients'] = 'At least one ingredient is required <br />';
} else{
   //echo htmlspecialchars($_POST['ingredients']);
   $ingredients = $_POST['ingredients'];
   if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {  // the regular expression checks of this ingredient is a comma  seperated list

        // echo 'Ingredients must be a comma seperated list';
        $errors['ingredients'] = 'Ingredients must be a comma seperated list';
     }
}

//checking errors and redirecting
       //redirecting the user to the home page
         if(array_filter($errors)){    //returns true if there are no errors in the form
          //  echo ' errors in the form';
         } else {
           // echo 'form valid';          
           //redirecting the user to the home page


//passing the info(emails, ingredients and the title) to the database
           //the code below protects the database, it avoids maliciouse info to enter the data base
           $email =  mysqli_real_escape_string($conn, $_POST['email']);  
           $title = mysqli_real_escape_string($conn, $_POST['title']);  //
           $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);  //


//create sql into the database
$sql = " INSERT INTO pizzas(title, email, ingredients) VALUES ( '$title','$email','$ingredients' )";   


//save to the database and check
       if(mysqli_query ($conn,$sql)){
         //success
               header('Location: http://localhost:8080/ninja/PROJECTS/index.php');
       }
         else {
            //err0r
               echo 'query error:' . mysqli_error($conn);
         }
       }
        
      }

; // this is the end of the post  



?>


<!DOCTYPE html>
<html lang="en">

<?php   include('header.php') ;     ?>

<section class="container grey-text ">
    <h4 class="center">Add a Pizza </h4>
    <!-- form -->
    <form  class= "white" action= "add.php" method="POST">   
        <!-- get method sends the data  in the url -->
        <!-- it loads the file  action="add.php, once it is loaded in the url,the url gets the file and performs a certain action above in the php tag   -->
        <label> Your Email: </label>
           <input type = "text" name="email" value = "<?php echo  htmlspecialchars($email) ?>"> 
           <!-- //when ouputing values to tje browser use htmlspecialchars -->
           <div class ="red-text "> <?php echo $errors['email']; ?></div>

        <label> Pizza Title: </label>
           <input type = "text" name="title" value ="<?php echo htmlspecialchars($title) ?>">
           <div class ="red-text "> <?php echo $errors['title']; ?></div>


        <label> Ingredients (comma seperated): </label>
          <input type = "text" name="ingredients" value ="<?php echo htmlspecialchars($ingredients) ?>">
          <div class ="red-text "> <?php echo $errors['ingredients']; ?></div>


        <div class ="center ">
          <input type="submit" name="submit" value="submit" class = "btn brand z-depth-0">
          
    </div>
    </form>

</section>

<?php   include('footer.php') ;     ?>


</html>