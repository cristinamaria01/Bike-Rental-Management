<?php 

    function select_user($db, $username) {
        $query = "SELECT c.Nume, c.Prenume, c.CNP, c.SeriaCI, c.NumarCI, c.Adresa_client, c.Telefon_client, b.Marca FROM info_client c INNER JOIN bicicleta b ON b.ID_inchiriere = c.ID_inchiriere WHERE username='$username'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $client = $result->fetch_assoc();
            return $client;
        }
    }

    function get_centers($db) {
        // we add centers
        $centers = array();
        $query = "SELECT c.Nume_centru FROM centru_inchiriere c WHERE c.ID_centru IN (SELECT ID_centru FROM bicicleta WHERE Libera='da') ";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            $_SESSION['center_number'] = mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()){
                $centers[$counter++] = $row;    
            }
            return $centers;
        }
    }


    function get_all_centers($db) {
        $centers = array();
        $query = "SELECT Nume_centru, Adresa_centru, Telefon_centru, Orar_functionare, Sector FROM centru_inchiriere";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            $_SESSION['center_number'] = mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()){
                $centers[$counter++] = $row;    
            }
            return $centers;
        }
        return $centers;
    }

    function get_brands($db) {
         // we add different brands
        $query = "SELECT DISTINCT Marca FROM bicicleta WHERE Libera='da'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            $_SESSION['brands_number'] = mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()){
                $brands[$counter++] = $row;
            }
            
            return $brands;
        }
    }

    function get_prices($db) {
        $tarife = array();
        $query = "SELECT * FROM tarife";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()){
                $tarife[$counter++] = $row;    
            }
            return $tarife;
        }
        return $tarife;
    }

    function get_delays($db) {
        $delays = array();
        $query = "SELECT Nr_minute, Tarif FROM intarziere";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            $_SESSION['center_number'] = mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()){
                $delays[$counter++] = $row;    
            }
            return $delays;
        }
        
    }

    function get_pagube($db) {
        $paguba = array();
        $query = "SELECT Tip_paguba, Pret_paguba FROM paguba";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            $_SESSION['center_number'] = mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()){
                $paguba[$counter++] = $row;    
            }
            return $paguba;
        }
        
    }
    
    function get_names($db) {
        $counter = 0;
        // we make another query to fetch the name of a center
        $second_query =  "SELECT * FROM centru_inchiriere";
        $second_result = mysqli_query($db, $second_query);

        while ($row = $second_result->fetch_assoc()){
            $names[$counter++] = $row;
        }
        return $names;
    }
    
    function get_id_center($db, $name) {
        $query = "SELECT ID_centru FROM centru_inchiriere WHERE Nume_centru='$name'";
        $result = mysqli_query($db, $query);
        $center = $result->fetch_assoc();
        return $center['ID_centru'];
    }

    function select_avaible($db) {
        $data = array();
        $names = array();
                               
       // we add bycycles
        $query = "SELECT * FROM bicicleta where Libera='da'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }
            
        }  
        
        return $data;
    }


    function select_brand($db, $brand) {
        $data = array();
        $names = array();
                               
       // we add bycycles
        $query = "SELECT Marca, Caracteristici, Pret_extra, ID_centru FROM bicicleta WHERE Marca='$brand' AND Libera='da' ";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }
            
        }  
        
        return $data;
    }

    function select_center($db, $center) {
        $data = array();
                               
       // we add bycycles
        $query = "SELECT Marca, Caracteristici, Pret_extra, ID_centru FROM bicicleta WHERE ID_centru='$center' AND Libera='da' ";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }
            
        }  
        
        return $data;
    }

     function select_unavaible($db) {
        $data = array();
                               
       // we add bycycles
        $query = "SELECT * FROM bicicleta where Libera='nu'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }
                    
        }  
         
         return $data;
    }


    function get_all_bikes($db) {
        $data = array();
                               
       // we add bycycles
        $query = "SELECT DISTINCT * FROM bicicleta WHERE ID_bicicleta != '34' ";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }           
        }   
         return $data;   
    }
    function delete_bike($db, $id) {
        $query = "DELETE FROM bicicleta WHERE ID_bicicleta='$id'";
        $result = mysqli_query($db, $query);
    }
    
    function get_client($db) {
        $data = array();
                               
       // we select client
        $query = "SELECT DISTINCT * FROM info_client WHERE Nume != 'admin'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }      
        }     
         return $data;  
    }

    function delete_client($db, $CNP) {
        $query = "DELETE FROM `info_client` WHERE `CNP`='$CNP'";
        $result = mysqli_query($db, $query);
    }

    function get_hire($db) {
        $data = array();
                               
       // select inchirierea
        $query = "SELECT `i`.`ID_inchiriere`, `i`.`ID_bicicleta`, `n`.`CNP`, `c`.`Nume_centru`, `i`.`Data_retur`, `t`.`Pret/ora`+`t`.`Pret/minut`+`p`.`Pret_paguba` + `b`.`Pret_extra` + `m`.`Tarif` AS TOTAL FROM `inchiriere` i 
        INNER JOIN `tarife` t ON `t`.`ID_Tarif` = `i`.`ID_Tarif` 
        INNER JOIN `info_client` n ON `n`.`ID_inchiriere` = `i`.`ID_inchiriere` 
        INNER JOIN `bicicleta` b ON `b`.`ID_bicicleta` = `i`.`ID_bicicleta` 
        INNER JOIN `intarziere` m ON `m`.ID_intarziere = `i`.`ID_intarziere` 
        INNER JOIN `paguba` p ON `p`.`ID_paguba`=`i`.`ID_paguba` 
        INNER JOIN `centru_inchiriere` c ON `c`.`ID_centru` IN (SELECT `ID_centru` FROM `bicicleta` WHERE `ID_bicicleta`=`i`.`ID_bicicleta`) ";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
                while ($row = $result->fetch_assoc()){
                    $data[$counter++] = $row;         
                }      
        }     
         return $data;  
    }   

    function delete_hire($db, $id) {
        $query = "DELETE FROM `inchiriere` WHERE `ID_inchiriere`='$id'";
        $result = mysqli_query($db, $query);
        
        $query = "UPDATE bicicleta SET Libera='da' WHERE ID_inchiriere='$id'";
        $result = mysqli_query($db, $query);
        
        $query = "UPDATE bicicleta SET ID_inchiriere=NULL WHERE ID_inchiriere='$id'";
        $result = mysqli_query($db, $query);
        
        $query = "UPDATE info_client SET ID_inchiriere='0' WHERE ID_inchiriere='$id'";
        $result = mysqli_query($db, $query);
        
    }



    function update_entry($db, $id, $id_client) {
        $query = "UPDATE bicicleta SET Libera='nu' WHERE ID_bicicleta='$id'";
        $result = mysqli_query($db, $query);
        
        $date = date("Y-m-d");
        $time = time();
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        
        $query = "INSERT INTO `inchiriere` (`ID_inchiriere`, `ID_client`, `ID_bicicleta`, `Data_inchiriere`, `Ora_inchiriere`, `ID_Tarif`, `Data_retur`, `Ora_retur`, `ID_paguba`, `ID_intarziere`) VALUES (NULL, '$id_client', '$id', '$date', '$time', '2', '$tomorrow', ' $time', '1', '1')" ;
        $result = mysqli_query($db, $query);
        
        $query = "SELECT ID_inchiriere from inchiriere WHERE ID_bicicleta='$id'";
        $result = mysqli_query($db, $query);
        
        $inchiriere = $result->fetch_assoc();
        $id_inchiriere = $inchiriere["ID_inchiriere"];
        
        $query = "UPDATE bicicleta SET ID_inchiriere='$id_inchiriere' WHERE ID_bicicleta='$id'";
        $result = mysqli_query($db, $query);
        
        $query = "UPDATE info_client SET ID_inchiriere='$id_inchiriere' WHERE ID_client='$id_client'";
        $result = mysqli_query($db, $query);
    }
?>


<?php
    session_start();

    $username = "";
    $password = "";
    $pass1 = "";
    $pass2 = "";
    $nume = "";
    $prenume = "";
    $adresa = "";
    $cnp = "";
    $numarci = "";
    $seriaci = "";
    $telefon = "";
    $errors = array();
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'gestiune_inchiriere');
    $data = array();
    $names = array();
    $brands = array();
    $centers = array();
    //$_SESSION["bicicleta_rezervata"] = 0;

    // if the registration button is clicked
    if (isset($_POST['register'])) {
        $nume = ($_POST['nume']);
        $prenume = ($_POST['prenume']);
        $telefon = ($_POST['telefon']);
        $adresa = ($_POST['adresa']);
        $cnp = ($_POST['cnp']);
        $seriaci = ($_POST['seriaci']);
        $numarci = ($_POST['numarci']);
        $username = ($_POST['username']);
        $pass1 = ($_POST['password1']);
        $pass2 = ($_POST['password2']);
        
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        
        if (empty($adresa)) {
            array_push($errors, "Adresa is required");
        }
        
        if (empty($telefon)) {
            array_push($errors, "Telefon is required");
        }
        
        if ((empty($telefon) == false) && ((strlen($telefon) != 10) || (is_numeric($telefon) == false))) {
            array_push($errors, "Numar Telefon Incorect");
        }
        
        if (empty($nume)) {
            array_push($errors, "Nume is required");
        }
        
        if (empty($prenume)) {
            array_push($errors, "Prenume is required");
        }
        
        if (empty($cnp)) {
            array_push($errors, "CNP is required");
        }
        
        if ((empty($cnp) == false) && ((strlen($cnp) != 13) || (is_numeric($cnp) == false)))  {
            array_push($errors, "CNP Incorect");
        }
        
        if (empty($seriaci)) {
            array_push($errors, "SeriaCI is required");
        }
        
        if ((empty($seriaci) == false) && ((strlen($seriaci) != 2) || (is_numeric($seriaci) == true))) {
            array_push($errors, "SeriaCI Incorecta");
        }
        
        if (empty($numarci)) {
            array_push($errors, "NumarCi is required");
        }
        
        if ((empty($numarci) == false) && ((strlen($numarci) != 6) || (is_numeric($numarci) == false))) {
            array_push($errors, "NumarCI Incorect");
        }
        
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        
        if (empty($pass1)) {
            array_push($errors, "Password is required");
        }
        
        if (strcmp($pass1, $pass2) != 0) {
            array_push($errors, "Passwords are not matching");
        }
        
        if (count($errors) == 0) {
            //$password = md5($pass1); // encrypt password
            $sql = "INSERT INTO info_client (Nume, Prenume , CNP, SeriaCI, NumarCI, Adresa_client, Telefon_client, username, parola) VALUES ('$nume', '$prenume', '$cnp', '$seriaci', '$numarci', '$adresa', '$telefon', '$username', '$pass1')";
            $result = mysqli_query($db, $sql);
            header('location: index.php');
        }
        
        else {
            array_push($errors, "Registration failed");
        }
    
    }

    // if the login button is clicked
    if (isset($_POST['login'])) {
        $username = ($_POST['username']);
        $password = ($_POST['password']);
        
        // ensure that form fields are filled properly
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
  
        if (count($errors) == 0) {
            //$password = md5($password); // encrypt password
            $query = "SELECT * FROM info_client WHERE username='$username' AND parola='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                $_SESSION['type'] = 0;
                $_SESSION['data'] = select_avaible($db);
                $_SESSION['number'] = count(select_avaible($db));
                $_SESSION['names'] = get_names($db); //$names;
                $_SESSION['show'] = 0;
                $_SESSION['brands'] = get_brands($db);
                $_SESSION['centers'] = get_centers($db);
                $_SESSION["canReserve"] = 0;
                
                header('location: home.php');
            
            }
                
        }else {
            array_push($errors, "Wrong username/password combination");
            }
    
    }

    if (isset($_POST['rez'])) {
        
        if ($_SESSION["canReserve"] == 0) {
            $user = $_SESSION['username'];
            $query = "SELECT ID_client from info_client WHERE username='$user'";
            $result = mysqli_query($db, $query);

            $user = $result->fetch_assoc();
            $id_client = $user["ID_client"];

            update_entry($db, $_REQUEST['rez'], $id_client);

            $_SESSION['success'] = "Te asteptam la centru sa-ti ridici bicicleta ";

            $_SESSION['data'] = select_avaible($db);
            $_SESSION['number'] = count(select_avaible($db));
            $_SESSION['show'] = 0;
            $_SESSION['type'] = 0;
            $_SESSION['brands'] = get_brands($db);
            $_SESSION['centers'] = get_centers($db);
            $_SESSION["canReserve"] = 1;
        } else {
            $_SESSION['success'] = "Ai rezervat deja o  bicicleta ";
        }
        header('location: home.php');
    }

    //marca
    if (isset($_POST['marca'])) {
        $_SESSION['success'] = "Biciclete din marca " . strval($_REQUEST['marca']);
        $_SESSION['data'] = select_brand($db, $_REQUEST['marca']);
        $_SESSION['number'] = count(select_brand($db, $_REQUEST['marca']));
        $_SESSION['show'] = 0;
        $_SESSION['type'] = 0;
        header('location: home.php');
    }
    //centru
    if (isset($_POST['centru'])) {
        $_SESSION['success'] = "Biciclete din centrul " . strval($_REQUEST['centru']);
        $id_centru = get_id_center($db, $_REQUEST['centru']);
        $_SESSION['data'] = select_center($db, $id_centru);
        $_SESSION['number'] = count(select_center($db, $id_centru));
        $_SESSION['show'] = 0;
        $_SESSION['type'] = 0;
        header('location: home.php');
    }

    //logout 
    if (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
        unset($_SESSION['success']);
    }
    
    if (isset($_POST['unavaible'])) {
        $_SESSION['success'] = "Biciclete ocupate";
        $_SESSION['data'] = select_unavaible($db);
        $_SESSION['number'] = count(select_unavaible($db));
        $_SESSION['show'] = 1;
        $_SESSION['type'] = 0;
        header('location: home.php');
    }
    
    if (isset($_POST['avaible'])) {
        $_SESSION['success'] = "Biciclete libere";
        $_SESSION['data'] = select_avaible($db);
        $_SESSION['number'] = count(select_avaible($db));
        $_SESSION['show'] = 0;
        $_SESSION['type'] = 0;
        header('location: home.php');
    }

    if (isset($_POST['info'])) {
        $_SESSION['success'] = "Datele dumneavoastra";
        $_SESSION['type'] = 1;
        $_SESSION['info'] = select_user($db, $_SESSION['username']);
        header('location: home.php');
    }

    if (isset($_POST['prices'])) {
        $_SESSION['success'] = "Tarifele noastre";
        $_SESSION['type'] = 2;
        $_SESSION['prices'] = get_prices($db);
        header('location: home.php');
        
    }

    if (isset($_POST['delays'])) {
        $_SESSION['success'] = "Taxele percepute pentru intarzieri";
        $_SESSION['type'] = 3;
        $_SESSION['delays'] = get_delays($db);
        header('location: home.php');
    }


    if (isset($_POST['pagube'])) {
        $_SESSION['success'] = "Tarifele noastre pentru incidente";
        $_SESSION['type'] = 4;
        $_SESSION['pagube'] = get_pagube($db);
        header('location: home.php');
    }

     if (isset($_POST['contact'])) {
        $_SESSION['success'] = "Informatii despre centrele de inchiriere";
        $_SESSION['type'] = 5;
        $_SESSION['contact'] = get_all_centers($db);
        header('location: home.php');
    }

    if (isset($_POST['bikes'])) {
        $_SESSION['success'] = "Gestioneaza bicicletele";
        $_SESSION['bikes'] = get_all_bikes($db);
        $_SESSION['type'] = 6;
        header('location: home.php');
    }
    
    if (isset($_POST['delete_bike'])) {
        $_SESSION['success'] = "Bicicleta cu ID-ul " . strval($_REQUEST['delete_bike']) . " a fost stearsa";
        delete_bike($db, $_REQUEST['delete_bike']);
        $_SESSION['bikes'] = get_all_bikes($db);
        header('location: home.php');
    }
    
        if (isset($_POST['client'])) {
        $_SESSION['success'] = "Gestioneaza clienti";
        $_SESSION['client'] = get_client($db);
        $_SESSION['type'] = 8;
        header('location: home.php');
    }
    
        if (isset($_POST['delete_client'])) {
        $_SESSION['success'] = "Clientul cu CNP-ul " . strval($_REQUEST['delete_client']) . " a fost sters";
        delete_client($db, $_REQUEST['delete_client']);
        $_SESSION['client'] = get_client($db);
        header('location: home.php');
    }
        
        if (isset($_POST['hire'])) {
        $_SESSION['success'] = "Gestioneaza inchierieri";
        $_SESSION['hire'] = get_hire($db);
        $_SESSION['type'] = 7;
        header('location: home.php');
    }
    
        if (isset($_POST['delete_hire'])) {
        $_SESSION['success'] = "Inchirierea cu ID-ul " . strval($_REQUEST['delete_hire']) . " a fost stearsa";
        delete_hire($db, $_REQUEST['delete_hire']);
        $_SESSION['hire'] = get_hire($db);
        header('location: home.php');
    }

?>