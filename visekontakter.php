<?php include "inkluder/database.php" ?>

<title>personer></title>


<body>






                <a href="leggTilKontakt.php">Legg til ny person</a>
                <?php
                    $sql = "
                    (SELECT type, id, fornavn, etternavn, tittel, adresse, telefonNummer, epost, CONCAT(fornavn, ' ', etternavn) navn FROM personer)
                    ";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                            while($row = $results->fetch_assoc()) {
                                    echo "<br>"."ID: " . $row["id"] . "<br>";
                                    echo "Fornavn: ".$row["fornavn"] . "<br>";
                                    echo "Etternavn: ".$row["etternavn"] . "<br>";
                                    echo "Adresse: ".$row["adresse"] . "<br>";
                                    echo "Epost: ".$row["epost"] . "<br>";
                                    echo "Telefonnummer: ".$row["telefonNummer"] . "<br>";
                                    echo "Tittel: ".$row["tittel"] . "<br>";
                                    echo "Type: ".$row["type"] . "<br>";
                            }
                        }

                        else {
                            echo "Ingen kontakter funnet.";
                        }

                    $conn->close();
                ?>
            </tbody>
        </table>

</body>
