<?php include("top.html"); ?>

<?php
    $ERR = array();
    $usr = array(
        'name' => '',
        'gender' => '',
        'age' => '',
        'persona_type' => '',
        'fav_os' => '',
        'min_seek_age' => '',
        'max_seek_age' => ''
    );

    /*Extract data from post request (associative array)*/
    if(isset($_POST['name'])) {
        $usr['name'] = urlencode($_POST['name']);
    }
    if(isset($_POST['gender'])) {
        $usr['gender'] = urlencode($_POST['gender']);
    }
    if(isset($_POST['age'])) {
        $usr['age'] = urlencode($_POST['age']);
    }
    if(isset($_POST['persona_type'])) {
        $usr['persona_type'] = ($_POST['persona_type']);
    }
    if(isset($_POST['fav_os'])) {
        $usr['fav_os'] = ($_POST['fav_os']);
    }
    if(isset($_POST['min_seek_age'])){
        $usr['min_seek_age'] = ($_POST['min_seek_age']);
    }
    if(isset($_POST['max_seek_age'])){
        $usr['max_seek_age'] = ($_POST['max_seek_age']);
    }

//full name validation
    if ( preg_match(" /[^a-zA-Z\s]/ ", $_POST["name"]) == 1) {
        $ERR = "Name can only contain alphabets"
    } 


?>

<?php include("bottom.html"); ?>