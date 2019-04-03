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
    if ( preg_match(" /[^a-zA-Z\s]/ ", $_POST["name"]) === 1) {
        $ERR[] = "Name can only contain alphabets";
    } 


    $full_name = explode(" ", $user["name"]); //delimited space
    if (count($full_name)===0){
        $ERR[] = "Name cannot be empty!!";
    }
    for ($i = 0; $i < count($full_name); $i++) {
        //check if all words are capitalized
        if(strcmp(ucfirst($full_name[$i]),$full_name[$i]) !== 0) {
            $ERR[] = "Every First Letter Must Be Capital!";
            break;
        }
    }

    //age validation
    if (!is_numeric($usr["age"]) || (int) $usr >= 200 ) {
        $ERR[] = "Age must be a sensible number!";
    }

    if (preg_match("/[I|E][S|N][F|T][J|P]/", $_POST['persona_type']) != 1) {
        $ERR[] = "Make sure the personality type exists!!";
    }

    if (!is_numeric($_POST["min_seek_age"]) || (int) $_POST['min_seek_age'] >=200 ) {
        $ERR[] = "Minimum Age sought must be a number!";
    }

    if (!is_numeric($_POST["max_seek_age"])) {
        $ERR[] = "Maximum age sought must be a number.";
    }

    foreach ($ERR as $e) {
        print($e)."\n";
    }

?>

<?php include("bottom.html"); ?>