<?php 

include('templates/config/db_connect.php');


//GET DATA FROM THE DATA BASE
        //write query for all the data base
        $sql =' SELECT  title, ingredients, id  FROM pizzas ORDER BY created_at ';   

        //make query and get results
        $result = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);   //fetches all the info from the results and returns an associative array  
         
        mysqli_free_result($result);  //frees the result from the memory

        mysqli_close($conn);  //closes the connection in the data base


        //We want to make sure that the ingredients, tomatoes which the user enters needs to be seperated with a comma  

       //  (explode(',', $pizzas[0]['ingredients']))   //cycles throught each pixels

//rendering data to the browser
        //when we grab this data  title, ingredients, id  FROM pizzas';   we can order it by using two key words e.g
        //orderby we can order by a specific column e.g title , id ,ingredients or by created_at
        //go to line 15 to view the order
           

        //print_r($pizzas);



?>


<!DOCTYPE html>
<html lang="en">


<?php   include('templates/header.php') ;     ?>

<!-- //continuation of line 7 , which displays the info of the user on the html browser-->

<h4 class ="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

       <?php  foreach($pizzas as $pizza):?>

        <div class="col s6 md3"> 
            <!-- col in materialized css to give space in between the grid -->
            <!-- s6  how many columns of width we want it to be on each individual screen size for our case it it is s6-->
            <!-- md3 medium screens i want you to take 3 columns of width -->
           
            <div class =" card z-depth-0 ">
              <img src= "templates\img\PIZZA.jpg" class="Pizza">

                <div class="card-content center">
                    <h6> <?php echo htmlspecialchars($pizza['title']);?> </h6>
                   <ul>

                    <!-- to cycle through the array  to ensure that the ingredients are displayed as list in each line -->

                      <?php   foreach( (explode(',', $pizza['ingredients']))  as $ing){?>    
                        
                                  <li> <?php   echo htmlspecialchars($ing) ;  ?></li>                           

                        <?php }?>
                   </ul>
                </div>
                <div class ="card-action right-align">
                    <a class ="brand-text" href="http://localhost:8080/ninja/PROJECTS/templates/details.php?id=<?php echo $pizza['id']?>"> more info </a> <!-- we used ?id = echo $pizza to ensure that the individual pizzas will be created-->
                </div>
            </div>
        </div>

        <?php  endforeach;?>   
        <!-- there is another way of closing the foreach which is placing the :and adding the foreach at the end (endforeach;) -->

           <!-- if(count($pizzas)>= 3):?> -->
            <!-- <p>there are 3 or more pizzas</p> -->
             <!-- else: ?> -->
                <!-- <p> there are less than 3 pizzas</p> -->
          <!-- hp endif; ?>   -->


 
    </div>
</div>

<?php   include('templates/footer.php') ;     ?>

</html>