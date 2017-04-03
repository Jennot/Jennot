<?php include "inkluder/database.php" ?>

<title>personer></title>


<body>






                <a href="jensleggTilPerson.php">Legg til ny person</a>
                <?php
                    $sql = "
                    (SELECT type, id, adresse, telefonNummer, epost, CONCAT(fornavn, ' ', etternavn) navn FROM personer)
                    ";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                            while($row = $results->fetch_assoc()) {
                                    echo "<br>"."ID: " . $row["id"] . "<br>";
                                    echo "Navn: ".$row["navn"] . "<br>";
                                    echo "Epost: ".$row["epost"] . "<br>";
                                    echo "Adresse: ".$row["adresse"] . "<br>";
                                    echo "Telefonnummer: ".$row["telefonNummer"] . "<br>";
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
