<?php 
//interact with the database
include('config/db_connect.php');

//detect the post method

if(isset($_POST['delete'])){
    //get the actual id from the input field
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    //delete the actual record
     $sql = "DELETE FROM pizzas WHERE id =$id_to_delete";

     //check if it is successfully done
    if(mysqli_query($conn, $sql)){
        //success
        header('Location: http://localhost:8080/ninja/PROJECTS/');
    } else{
        //failure
        echo 'query error:' . mysqli_error($conn);
    }
}


//check GET request parameters
if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = " SELECT * FROM pizzas WHERE id = $id ";

    //get the query results
    $result = mysqli_query($conn, $sql);

    //fetch result in an array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

   // print_r($pizza);

}

?>

<!DOCTYPE html>
<html lang="en">

  <?php   include('header.php') ;?>

    <div class ="container center grey-text">
        
        <?php if($pizza):?>
            
<!-- Card for the individual pizzas -->
<div class="container Bigcontainer center ">
    <div class="row">
     <div class="col s12 m6">
      <div class="card card z-depth-0 m-4">
        <div class="card-image">
        </div>
        <div class="card-content">
        <h4> <?php echo htmlspecialchars($pizza['title']);  ?></h4>
            <p> Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p> <?php  echo date ($pizza['created_at']); ?></p>  
             <h5> Ingredients:</h5>   
             <p> <?php echo htmlspecialchars($pizza['ingredients']); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>


             
             
             <!-- delete form -->
             <form action="details.php" method= "POST">
                
                <input type="hidden" name ="id_to_delete" value ="<?php echo $pizza['id'] ?>">
                <input type ="submit" name ="delete" value="Dlete" class ="btn brand z-depth-0">
                 
             </form>

          <?php else: ?>

            <h5> No such pizza exist!</h5>

         <?php endif;?>   

               
    </div>



   <?php   include('footer.php') ;     ?>


</html>