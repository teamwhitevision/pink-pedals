<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";
$tabul = "tour";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'pink_pedals');


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $phone2 = mysqli_real_escape_string($db, $_POST['phone2']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $id_type = mysqli_real_escape_string($db, $_POST['radiogroupgg']);
    $id_num = mysqli_real_escape_string($db, $_POST['id_card']);
    $tour_date = mysqli_real_escape_string($db, $_POST['date']);
    $pink_aura = mysqli_real_escape_string($db, $_POST['pinkaura']);
    $heritage = mysqli_real_escape_string($db, $_POST['heritage']);
    $pink_leagacy = mysqli_real_escape_string($db, $_POST['pinkleagacy']);
    $ohmyjaipur = mysqli_real_escape_string($db, $_POST['ohmyjaipur']);
    $gender = mysqli_real_escape_string($db, $_POST['radiogroup']);
    $age = mysqli_real_escape_string($db, $_POST['age']);


    if ($pink_aura > 0) {
        $pass = $pink_aura;
    } elseif ($heritage > 0) {
        $pass = $heritage;
    } elseif ($pink_leagacy > 0) {
        $pass = $pink_leagacy;
    } elseif ($ohmyjaipur > 0) {
        $pass = $ohmyjaipur;
    }



    if (isset($_POST['pfname0'])) {
        $t1fname1 = $_POST['pfname0'];

        $gender1 = $_POST['radiogroup0'];
        $age1 = $_POST['age0'];
    }
    if (isset($_POST['pfname1'])) {
        $t1fname2 = $_POST['pfname1'];

        $gender2 = $_POST['radiogroup1'];
        $age2 = $_POST['age1'];
    }
    if (isset($_POST['pfname2'])) {
        $t1fname3 = $_POST['pfname2'];

        $gender3 = $_POST['radiogroup2'];
        $age3 = $_POST['age2'];
    }
    if (isset($_POST['pfname3'])) {
        $t1fname4 = $_POST['pfname3'];

        $gender4 = $_POST['radiogroup3'];
        $age4 = $_POST['age3'];
    }
    if (isset($_POST['pfname4'])) {
        $t1fname5 = $_POST['pfname4'];

        $gender5 = $_POST['radiogroup4'];
        $age5 = $_POST['age4'];
    }
    if (isset($_POST['pfname5'])) {
        $t1fname6 = $_POST['pfname5'];

        $gender6 = $_POST['radiogroup5'];
        $age6 = $_POST['age5'];
    }
    if (isset($_POST['pfname6'])) {
        $t1fname7 = $_POST['pfname6'];

        $gender7 = $_POST['radiogroup6'];
        $age7 = $_POST['age6'];
    }


    // form validation: ensure that the form is correctly filled
    if (empty($fname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($lname)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($tour_date)) {
        array_push($errors, " Tour Date is required");
    }

    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($id_num)) {
        array_push($errors, "ID Card Number is required");
    }

    if (empty($id_type)) {
        array_push($errors, "Id Type is required");
    }



    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO tour_booking (fname, lname, phone, address,  email, alternate_phone, id_type, id_num, pink_aura, heritage, pink_leagacy, ohmyjaipur, tour_date) 
					  VALUES('$fname','$lname','$phone', '$address', '$email', '$phone2', '$id_type', '$id_num', '$pink_aura', '$heritage', '$pink_leagacy','$ohmyjaipur', '$tour_date' )";
        mysqli_query($db, $query);
        $last_id = mysqli_insert_id($db);

        if ($pass == 1) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1) 
					  VALUES('$phone', '$tour_date','$fname','$lname','$age', '$gender')";
        } elseif ($pass == 2) {
            $query2 = "INSERT INTO tourist_details (phone_number,tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2) 
					  VALUES('$phone', '$tour_date','$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1')";
        } elseif ($pass == 3) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3) 
					  VALUES('$phone','$tour_date', '$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2')";
            mysqli_query($db, $query2);
        } elseif ($pass == 4) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3, pfname4, age4, gender4) 
            VALUES('$phone','$tour_date', '$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2', '$t1fname3', '$age3', '$gender3')";
            mysqli_query($db, $query2);
        } elseif ($pass == 5) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3, pfname4, age4, gender4, pfname5, age5, pfname5) 
            VALUES('$phone', '$tour_date','$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2', '$t1fname3', '$age3', '$gender3', '$t1fname4', '$age4', '$gender4')";
            mysqli_query($db, $query2);
        } elseif ($pass == 6) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3, pfname4, age4, gender4, pfname5, age5, gender5, pfname6, age6, gender6 ) 
            VALUES('$phone','$tour_date', '$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2', '$t1fname3', '$age3', '$gender3', '$t1fname4', '$age4', '$gender4','$t1fname5', '$age5', '$gender5')";
            mysqli_query($db, $query2);
        } elseif ($pass == 7) {
            $query2 = "INSERT INTO tourist_details (phone_number, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3, pfname4, age4, gender4, pfname5, age5, gender5, pfname6, age6, gender6, pfname7, age7, gender7 ) 
            VALUES('$phone', '$tour_date','$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2', '$t1fname3', '$age3', '$gender3', '$t1fname4', '$age4', '$gender4', '$t1fname5', '$age5', '$gender5', '$t1fname6', '$age6', '$gender6')";
            mysqli_query($db, $query2);
        } elseif ($pass == 8) {
            $query2 = "INSERT INTO tourist_details ($phone, tour_date, pfname1, plname2, age1, gender1, pfname2, age2, gender2, pfname3, age3, gender3, pfname4, age4, gender4, pfname5, age5, gender5, pfname6, age6, gender6, pfname7, age7, gender7 , pfname8, age8, gender8) 
            VALUES('$phone', '$tour_date','$fname','$lname','$age', '$gender', '$t1fname1','$age1', '$gender1', '$t1fname2', '$age2', '$gender2', '$t1fname3', '$age3', '$gender3', '$t1fname4', '$age4', '$gender4', '$t1fname5', '$age5', '$gender5', '$t1fname6', '$age6', '$gender6', '$t1fname7', '$age7', '$gender7')";
            mysqli_query($db, $query2);
        }

        $lastid = mysqli_insert_id($db);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['tble_name'] = $tabul;
        $_SESSION['last_id'] = $lastid;

        header('location: register2payment2.php');
    }
}
