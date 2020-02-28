<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <div class="header">
        <h2>Rent bikes</h2>
    </div>

    <div class="content">
        <?php if(isset($_SESSION['success'])) :?>
            <div class="error success">
                <h3>
                    <?php echo $_SESSION['success'];
                    ?>
                </h3>
            </div>
        <?php endif ?>

       
        
        <?php if (strcmp($_SESSION["username"], "admin") == 0) :?>
             
            <?php if ($_SESSION["type"] == 6) :?>
                    <table style="padding-left: 0px;">
                         <tr>
                            <th>ID bicicleta</th>
                            <th>Brand</th>
                            <th>Caracteristici</th>
                            <th>ID centru</th>
                            <th>Libera</th>
                            <th>Pret extra</th>
                            <th>ID inchiriere</th>
                            <th>Modifica</th>
                         </tr>
                         
                         <?php foreach ($_SESSION['bikes'] as $bike) :?>
                            <tr>
                                <td><?php echo $bike['ID_bicicleta']; ?></td>
                                <td><?php echo $bike['Marca']; ?></td>
                                <td><?php echo $bike['Caracteristici']; ?></td>
                                <td><?php echo $bike['ID_centru']; ?></td>
                                <td><?php echo $bike['Libera']; ?></td>
                                <td><?php echo $bike['Pret_extra']; ?></td>
                                <td><?php echo $bike['ID_inchiriere']; ?></td>
                                <td>  
                                    <form method="post" action="home.php" > 
                                        <div class="button">
                                            <button type="submit" name="delete_bike" value="<?php echo $bike['ID_bicicleta']; ?>" class="btn"> Sterge </button>
                                        </div>
                                    </form>  
                                </td>
                               
                            </tr>
                         <?php endforeach ?>  
                     </table>

            <?php endif ?>
        
        
            <?php if ($_SESSION["type"] == 7) :?>
                    <table style="padding-left: 0px;">
                         <tr>
                            <th>ID Inchiriere</th>
                            <th>ID Bicicleta</th>
                            <th>CNP client</th>
                            <th>Centru</th>
                            <th>Data retur</th>
                            <th>Total plata</th>
                            <th>Sterge inchiriere</th>
                         </tr>
                         
                         <?php foreach ($_SESSION['hire'] as $hire) :?>
                            <tr>
                                <td><?php echo $hire['ID_inchiriere']; ?></td>
                                <td><?php echo $hire['ID_bicicleta']; ?></td>
                                <td><?php echo $hire['CNP']; ?></td>
                                <td><?php echo $hire['Nume_centru']; ?></td>
                                <td><?php echo $hire['Data_retur']; ?></td>
                                <td><?php echo number_format($hire['TOTAL'], 2); ?></td>
                                <td>  
                                    <form method="post" action="home.php" > 
                                        <div class="button">
                                            <button type="submit" name="delete_hire" value="<?php echo $hire['ID_inchiriere']; ?>" class="btn"> Delete+Update </button>
                                        </div>
                                    </form>  
                                </td>
                               
                            </tr>
                         <?php endforeach ?>  
                     </table>   
        
            <?php endif ?>
        
        
            <?php if ($_SESSION["type"] == 8) :?>
                    <table style="padding-left: 0px;">
                         <tr>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>CNP</th>
                            <th>Seria CI</th>
                            <th>Numar CI</th>
                            <th>Adresa</th>
                            <th>Telefon</th>
                            <th>ID inchiriere</th>
                            <th>username</th>
                            <th>Modifica</th>
                         </tr>
                         
                         <?php foreach ($_SESSION['client'] as $client) :?>
                            <tr>
                                <td><?php echo $client['Nume']; ?></td>
                                <td><?php echo $client['Prenume']; ?></td>
                                <td><?php echo $client['CNP']; ?></td>
                                <td><?php echo $client['SeriaCI']; ?></td>
                                <td><?php echo $client['NumarCI']; ?></td>
                                <td><?php echo $client['Adresa_client']; ?></td>
                                <td><?php echo $client['Telefon_client']; ?></td>
                                <td><?php echo $client['ID_inchiriere']; ?></td>
                                <td><?php echo $client['username']; ?></td>
                                <td>  
                                    <form method="post" action="home.php" > 
                                        <div class="button">
                                            <button type="submit" name="delete_client" value="<?php echo $client['CNP']; ?>" class="btn"> Sterge </button>
                                        </div>
                                    </form>  
                                </td>
                               
                            </tr>
                         <?php endforeach ?>  
                     </table>   
            <?php endif ?>
        
                <?php if ($_SESSION["type"] == 2) :?>
                    <table>
                         <tr>
                            <th>Interval orar</th>
                            <th>Ziua</th>
                            <th>Pret/ora</th>
                            <th>Pret/minut</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["prices"] as $tarif) :?>
                            <tr>
                                <td><?php echo $tarif['Interval_orar']; ?></td>
                                <td><?php echo $tarif['Ziua']; ?></td>
                                <td><?php echo $tarif['Pret/ora']; ?> lei</td>
                                <td><?php echo $tarif['Pret/minut']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                <?php endif ?>
            
                <?php if ($_SESSION["type"] == 3) :?>
                    <table style="padding-left: 240px;">
                         <tr>
                            <th>Numar minute</th>
                            <th>Tarif</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["delays"] as $delay) :?>
                            <tr>
                                <td><?php echo $delay['Nr_minute']; ?></td>
                                <td><?php echo $delay['Tarif']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                
                <?php endif ?>
                
                <?php if ($_SESSION["type"] == 4) :?>
                     <table style="padding-left: 200px;">
                         <tr>
                            <th>Tip paguba</th>
                            <th>Pret paguba</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["pagube"] as $paguba) :?>
                            <tr>
                                <td><?php echo $paguba['Tip_paguba']; ?></td>
                                <td><?php echo $paguba['Pret_paguba']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                
                <?php endif ?>
        
                <?php if ($_SESSION["type"] == 5) :?>
                    <?php foreach ($_SESSION["contact"] as $contact) :?>
                        <p>Nume centru: <?php echo $contact['Nume_centru'] ?></p>
                        <hr/>
                        <p>Adresa centru: <?php echo $contact['Adresa_centru'] ?></p>
                        <hr/>
                        <p>Telefon centru: <?php echo $contact['Telefon_centru'] ?></p>
                        <hr/>
                        <p>Orar: <?php echo $contact['Orar_functionare'] ?></p>
                        <hr/>
                        <p>Sector: <?php echo $contact['Sector'] ?></p>
                        <hr/>
                        <br/>
                        <br/>
                    <?php endforeach ?>
                 <?php endif ?>
        
        <?php endif ?>
        
        <?php if (strcmp($_SESSION["username"], "admin") != 0) :?>
            <div class="adjusted">
               
                <?php if ($_SESSION["type"] == 0) :?>
                    <p> Biciclete gasite: <?php echo $_SESSION["number"]?> </p>
                     <br/>

                    <?php foreach ($_SESSION["data"] as $bicicleta) :?>
                        <hr/>
                        <p> Model: <?php echo $bicicleta["Marca"] ?> </p>
                        <p> Caracterisitici: <?php echo $bicicleta["Caracteristici"] ?> </p>

                        <?php foreach ($_SESSION["names"] as $centru) :?>
                            <?php if (strcmp($centru["ID_centru"], $bicicleta["ID_centru"]) == 0) :?>
                                <p> Centru: <?php echo $centru["Nume_centru"] ?> </p>
                            <?php endif ?>
                         <?php endforeach ?> 

                        <p> Pret : <?php echo $bicicleta["Pret_extra"] ?> </p>

                        <?php if ($_SESSION["show"] == 0) :?>
                            <div class="">
                                <form method="post" action="home.php" > 
                                    <div class="button">
                                        <button type="submit" name="rez" value="<?php echo $bicicleta['ID_bicicleta']; ?>" class="btn"> Rezerva </button>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>

                    <?php endforeach ?>
                
                 <?php endif ?>
                 
                 <?php if ($_SESSION["type"] == 1) :?>
                    <p>Nume: <?php $info = $_SESSION["info"]; echo $info['Nume'] ?></p>
                    <hr/>
                    <p>Prenume: <?php $info = $_SESSION["info"]; echo $info['Prenume'] ?></p>
                    <hr/>
                    <p>CNP: <?php $info = $_SESSION["info"]; echo $info['CNP'] ?></p>
                    <hr/>
                    <p>Adresa: <?php $info = $_SESSION["info"]; echo $info['Adresa_client'] ?></p>
                    <hr/>
                    <p>Telefon: <?php $info = $_SESSION["info"]; echo $info['Telefon_client'] ?></p>
                    <hr/>
                    <p>Bicicleta rezervata: <?php $info = $_SESSION["info"]; echo $info['Marca'] ?></p>
                    
                 <?php endif ?>
                
                 <?php if ($_SESSION["type"] == 5) :?>
                    <?php foreach ($_SESSION["contact"] as $contact) :?>
                        <p>Nume centru: <?php echo $contact['Nume_centru'] ?></p>
                        <hr/>
                        <p>Adresa centru: <?php echo $contact['Adresa_centru'] ?></p>
                        <hr/>
                        <p>Telefon centru: <?php echo $contact['Telefon_centru'] ?></p>
                        <hr/>
                        <p>Orar: <?php echo $contact['Orar_functionare'] ?></p>
                        <hr/>
                        <p>Sector: <?php echo $contact['Sector'] ?></p>
                        <hr/>
                        <br/>
                        <br/>
                    <?php endforeach ?>
                 <?php endif ?>
                
                 <?php if ($_SESSION["type"] == 2) :?>
                     <table>
                         <tr>
                            <th>Interval orar</th>
                            <th>Ziua</th>
                            <th>Pret/ora</th>
                            <th>Pret/minut</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["prices"] as $tarif) :?>
                            <tr>
                                <td><?php echo $tarif['Interval_orar']; ?></td>
                                <td><?php echo $tarif['Ziua']; ?></td>
                                <td><?php echo $tarif['Pret/ora']; ?> lei</td>
                                <td><?php echo $tarif['Pret/minut']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                 <?php endif ?>
                
                 <?php if ($_SESSION["type"] == 3) :?>
                    <table style="padding-left: 240px;">
                         <tr>
                            <th>Numar minute</th>
                            <th>Tarif</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["delays"] as $delay) :?>
                            <tr>
                                <td><?php echo $delay['Nr_minute']; ?></td>
                                <td><?php echo $delay['Tarif']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                
                 <?php endif ?>
                
                 <?php if ($_SESSION["type"] == 4) :?>
                     <table style="padding-left: 200px;">
                         <tr>
                            <th>Tip paguba</th>
                            <th>Pret paguba</th>
                         </tr>
                         
                         <?php foreach ($_SESSION["pagube"] as $paguba) :?>
                            <tr>
                                <td><?php echo $paguba['Tip_paguba']; ?></td>
                                <td><?php echo $paguba['Pret_paguba']; ?> lei</td>
                            </tr>
                         <?php endforeach ?>  
                     </table>     
                     <br/>
                     <br/>
                
                 <?php endif ?>
                
            </div>
        <?php endif ?>
    </div>
    
    <div class="content menu_left center">
        <?php if(isset($_SESSION["username"])) :?>
            <?php if (strcmp($_SESSION["username"], "admin") != 0) :?>
                <p>Biciclete</p>
                <form method="post" action="home.php">
                    <div class="button">
                        <button type="submit" name="avaible" class="btn">Disponibile</button>
                    </div>

                    <div class="button">
                        <button type="submit" name="unavaible" class="btn">Indisponibile</button>
                    </div>

                    <p>Modele</p>
                        <?php foreach ($_SESSION["brands"] as $brand) :?>
                            <div class="button">
                                <button type="submit" name="marca" value="<?php echo $brand['Marca']; ?>" class="btn"><?php echo $brand["Marca"] ?></button>
                            </div>
                        <?php endforeach ?>

                    <p>Centre</p>
                        <?php foreach ($_SESSION["centers"] as $center) :?>
                            <div class="button">
                                <button type="submit" name="centru" class="btn" value ="<?php echo $center["Nume_centru"]; ?> "> <?php echo $center["Nume_centru"] ?></button>
                            </div>
                        <?php endforeach ?>

                <p>Tarife</p>
                    <div class="button">
                        <button type="submit" name="prices" class="btn">Preturi</button>
                    </div>
                    <div class="button">
                        <button type="submit" name="delays" class="btn">Intarzieri</button>
                    </div>
                    <div class="button">
                        <button type="submit" name="pagube" class="btn">Pagube</button>
                    </div>


                </form>
            <?php endif ?>
        
            <?php if (strcmp($_SESSION["username"], "admin") == 0) :?>
                <form method="post" action="home.php">
                    <p>Gestioneaza</p>
                    <div class="button">
                            <button type="submit" name="bikes" class="btn">Situatie biciclete</button>
                    </div>
                    <div class="button">
                            <button type="submit" name="client" class="btn">Informati Clienti</button>
                    </div>
                    <div class="button">
                            <button type="submit" name="hire" class="btn">Inchirieri</button>
                    </div>
                    <div class="button">
                            <button type="submit" name="contact" class="btn">Centre</button>
                    </div>
                    <p>Tarife</p>
                    <div class="button">
                        <button type="submit" name="prices" class="btn">Preturi</button>
                    </div>
                    <div class="button">
                        <button type="submit" name="delays" class="btn">Intarzieri</button>
                    </div>
                    <div class="button">
                        <button type="submit" name="pagube" class="btn">Pagube</button>
                    </div>
                    
                </form>
            <?php endif ?>
         
        <?php endif ?>
    </div>
    
    <br/>
    
    <div class="content menu_right center">
        <?php if(isset($_SESSION["username"])) :?>
           
            <div class="adjusted center">
                <p>Welcome <strong><?php echo $_SESSION['username'] ?></strong></p>
            </div>
            
            <?php if (strcmp($_SESSION["username"], "admin") != 0) :?>
                <form method="post" action="home.php">

                    <div class="button">
                         <button type="submit" name="info" class="btn">Info cont</button>
                    </div>

                    <div class="button">
                         <button type="submit" name="contact" class="btn">Contact</button>
                    </div>

                    <div class="button">
                        <button type="submit" name="logout" class="btn">Logout</button>
                    </div>

                </form>
            <?php endif ?>
            
            <?php if (strcmp($_SESSION["username"], "admin") == 0) :?>
                <form method="post" action="home.php">
                    <div class="button">
                            <button type="submit" name="logout" class="btn">Logout</button>
                    </div>
                </form>
            <?php endif ?>
            
         <?php endif ?>
    </div>
    
  
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    
</body>

</html>
