<?php 

 session_start();

    //delete the session
    //$_SESSION['name'] = 'gilian';  // overwrites the name the user enters.

    //delete the name
    // if($_SERVER['QUERY_STRING'] == 'noname') {  //query string = those things at the end of the url
    //    unset($_SESSION['name']);//unsets a single variable
    //    session_unset(); // unsets all the variables
    // }

 //$name = $_SESSION['name'];

 //null coalesce operator
 $name = $_SESSION['name'] ?? 'Guest';

 //get cookie
 $gender = $_COOKIE['gender'] ?? 'unknown';
 //print_r($_COOKIE['gender']);

?>


<head>

    <title> Mimi's-pizza </title>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
 <style type = "text/css">
    .brand{
        background:  red !important;
    }
    .brand-text{
        color: red !important ;
    }
    
    form{
        max-width: 460px;
        margin: 20px auto;
        padding: 20px ;
        border-radius: 10px;
    }
    
    .Pizza{
        max-width: 460px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
        border-radius: 900px;
        padding: 5px;
        width : 120px;
    }

    .Bigcontainer{
        margin: 5px 300px;
        padding: 4px;
    }

 </style>
</head>
 

<body class=" grey lighten-4">
    <nav class="white z-depth-0">
        <div class ="container">
            <a href="http://localhost:8080/ninja/PROJECTS" class ="brand-logo brand-text"> Mimi's-Pizza </a>
            <ul id= "nav-mobile" class="right hide-on-small-and-down">
                <li class ="grey-text"> Hello <?php  echo htmlspecialchars($name); ?> </li>
                <li class ="grey-text"> ( <?php  echo htmlspecialchars($gender); ?> ) </li>
                </li><a href="http://localhost:8080/ninja/PROJECTS/templates/add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>

    


    
 