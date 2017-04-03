<?php include "inkluder/database.php" ?>

<title>personer></title>


<body>






                <a href="kontaktfirmatest.php">Legg til ny person</a>
                <?php
                    $sql = "
                    (SELECT id, navn, adresse, epost, nettside, organisasjonsNummer, telefonNummer, type FROM firmaer)
                    ";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                            while($row = $results->fetch_assoc()) {
                                    echo "<br>"."ID: " . $row["id"] . "<br>";
                                    echo "Bedriftsnavn: ".$row["navn"] . "<br>";
                                    echo "Adresse: ".$row["adresse"] . "<br>";
                                    echo "Epost: ".$row["epost"] . "<br>";
                                    echo "Organisasjonsnummer: ".$row["OrganisasjonsNummer"] . "<br>";
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
