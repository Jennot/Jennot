<?php include "inkluder/database.php" ?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $person_Fornavn = $_POST['person_Fornavn'];
        $person_Etternavn = $_POST['person_Etternavn'];
        $person_Epost = $_POST['person_Epost'];
        $person_Adresse = $_POST['person_Adresse'];
        $person_Firma = $_POST['person_Firma'];
        $person_Nettside = $_POST['person_Nettside'];
        if (empty($_POST['person_TelefonNummer'])) {
            $person_TelefonNummer = 0;
        }
        else {
            $person_TelefonNummer = $_POST['person_TelefonNummer'];
        }
        $person_Tittel = $_POST['person_Tittel'];
        $type = "Person";
        $sql = "INSERT INTO personer (fornavn, etternavn, epost, adresse, firmaTilhorighet, nettside, telefonNummer, tittel, type)
        VALUES ('$person_Fornavn', '$person_Etternavn', '$person_Epost', '$person_Adresse', '$person_Firma', '$person_Nettside', '$person_TelefonNummer', '$person_Tittel', '$type')";

        if ($conn->query($sql) === TRUE) {
            header("Location: jenspersoner.php");
        }
        else {
            $error = $conn->error;
            echo $error;
        }
    }


?>

<title>Legg til person</title>

<body>

    <h2>Legg til person</h2>
    <a href="jenspersoner.php"><- Tilbake</a>

        <div>
            <form id="personForm" action="jenspersoner.php" method="post">
                    <br>

                    Fornavn
                    <input type="text" name="person_Fornavn"><br><br>

                    Etternavn
                    <input type="text" name="person_Etternavn"><br><br>

                    Epost
                    <input type="text" name="person_Epost"><br><br>

                    Adresse
                    <input type="text" name="person_Adresse"><br><br>

                    Telefonnummer
                    <input type="text" name="person_Telefonnummer"><br><br>

                    Nettside
                    <input type="text" name="person_Nettside"><br><br>

                    Firma
                    <input type="text" name="person_Firma"><br><br>

                    Tittel
                    <input type="text" name="person_Tittel"><br><br>

                    <button type="submit" name="Person">Legg til</button>

            </form>
        </div>
</body>
