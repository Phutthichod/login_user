<?php

    session_start();
    require 'database.php';
    $data = new database();

    // echo $data->select('SELECT p_id,p_alias,p_species,p_icon,color.code_color FROM user_plant 
    // JOIN (SELECT * FROM plant AS P JOIN color AS C ON P.p_color = C.p_color) AS PC
    // on (PC.p_id = user_plant.plant_id) where user_plant.user_id = 1');    

    echo $data->select('SELECT p_alias,p_species,p_icon,color.code_color from  plant 
    join user_plant on (plant.p_id = user_plant.plant_id) 
    join color on (plant.p_color = color.p_color) where user_plant.user_id =  '.$_SESSION["userid"]); 

     
?>