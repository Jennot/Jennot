 <?php include "inkluder/database.php"; ?>

<!-- Legge til brukerinput om personer -->
   <html>
   <body>



      <form method="post" action="leggTilKontakt.php">
     Fornavn:<br>
       <input type="text" name="person_Fornavn">
     <br>
     Etternavn:<br>
       <input type="text" name="person_Etternavn">
     <br>
     Epost:<br>
       <input type="text" name="person_Epost">
     <br>
     Adresse:<br>
       <input type="text" name="person_Adresse">
     <br>
     Firma:<Br>
       <input type="text" name="person_Firma">
     <br>
     Nettside:<br>
       <input type="text" name="person_Nettside">
     <br>
     Telefonnummer:<br>
       <input type="text" name="person_TelefonNummer">
     <br>
     Tittel:<br>
       <input type="text" name="person_Tittel">
     <br>
     <br><br>
     <input type="submit" value="Registrer">
   </form>

   </body>
   </html>
<!-- lage variabler til brukerinputen og legge den inn i databsen "Busy", i tabellen "Person" -->
   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $person_Fornavn = $_POST['person_Fornavn'];
     $person_Etternavn = $_POST['person_Etternavn'];
     $person_Epost = $_POST['person_Epost'];
     $person_Adresse = $_POST['person_Adresse'];
     $person_Firma = $_POST['person_Firma'];
     $person_Nettside = $_POST['person_Nettside'];
     $person_telefonNummer = $_POST['person_TelefonNummer'];
     if (empty($_POST['person_TelefonNummer'])) {
      $person_Telefonnummer = 0;
      }
     else {
       $person_Telefonnummer = $_POST['person_TelefonNummer'];
     }
     $person_Tittel = $_POST['person_Tittel'];
     $type = "Person";
     /* Sett inn i databasen: "fornavn, etternavn, epost, adresse, firmaTilhorighet, nettside, telefonNummer, tittel, type" (dette er navnene i databasen!!!)
     og VALUE er verdien de får i formen. */
     $sql = "INSERT INTO personer (fornavn, etternavn, epost, adresse, firmaTilhorighet, nettside, telefonNummer, tittel, type)
            VALUES ('$person_Fornavn', '$person_Etternavn', '$person_Epost', '$person_Adresse', '$person_Firma', '$person_Nettside',  $person_telefonNummer, '$person_Tittel', '$type')";

/* Ønske velkommen til min database, og skrive ut en feilmelding */

          if ($conn->query($sql) === TRUE) {
              $errormsg = "";
              echo " Velkommen til vår database " . $_POST['person_Fornavn'] . " " . $_POST['person_Etternavn'];

              sleep(0);
              die();

          }
          else {
              $errormsg = $conn->error;
              echo $errormsg;
          }
     }



    ?>
