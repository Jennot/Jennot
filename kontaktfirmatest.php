<?php include "inkluder/database.php"; ?>



  <html>
  <body>

<!-- Legge inn brukerinput i former -->

     <form method="post" action="kontaktfirmatest.php">
    Firmanavn:<br>
      <input type="text" name="firma_Navn">
    <br>
    Adresse:<br>
      <input type="text" name="firma_Adresse">
    <br>
    Epost:<br>
      <input type="text" name="firma_Epost">
    <br>
    Nettside:<br>
      <input type="text" name="firma_Nettside">
    <br>
    Organisasjonsnummer:<br>
      <input type="text" name="firma_Organisasjonsnummer">
    <br>
    <br><br>
    <input type="submit" value="Registrer">
  </form>

  </body>
  </html>

  <!-- Lage variabler til brukerinputen, og legge den inn i databasen "Busy" i tabellen firmaer -->

  <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $firma_Navn = "'" . $_POST['firma_Navn'] . "'";
          $firma_Organisasjonsnummer = "'" . $_POST['firma_Organisasjonsnummer'] . "'";
          $firma_Adresse = "'" . $_POST['firma_Adresse'] . "'";
          $firma_Epost = "'" . $_POST['firma_Epost'] . "'";
          $firma_Nettside = "'" . $_POST['firma_Nettside'] . "'";
          if (empty($_POST['firma_Telefonnummer'])) {
           $person_Telefonnummer = 0;
           }
          else {
            $firma_Telefonnummer = $_POST['firma_Telefonnummer'];
          }
          $type = "'"."Firma"."'";

          $sql = "INSERT INTO firmaer(
          type, navn, adresse, epost, nettside, organisasjonsNummer, telefonNummer
          ) VALUES (
          " .$type. ", " .$firma_Navn. ", " .$firma_Adresse. ", " .$firma_Epost. "," .$firma_Nettside. ", " .$firma_Organisasjonsnummer. ", " .$firma_Nettside. " )";

/* Si velkommen til min database, og skrive ut feilmelding hvis man ikke klarer å koble seg til databasen */

             if ($conn->query($sql) === TRUE) {
                 $errormsg = "";
                 echo " Velkommen til vår database " . $_POST['firma_Navn'];

             }
             else {
                 $errormsg = $conn->error;
                 echo $errormsg;
             }
        }


       ?>
