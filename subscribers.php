<? include "include/header.php";
include "include/config.php";
// echo $_SESSION['id'];
if (($_SESSION['id'] === '46') || ($_SESSION['id'] === '895') || ($_SESSION['id'] === '901')) {


    $sql = "SELECT users.id, users.discordName, users.firstname, users.lastName, users.email, users.subscriptionDate, users.registrationDate
    FROM users WHERE subscriptionDate >= NOW()
    ORDER BY subscriptionDate DESC";

    $result = $connection->query($sql);
?>

<div class="background-black text-white" style="  
    position: absolute;
    top: 3%;
    left: 20px;
    padding: 10px 20px;
    ">
    <?='Subscribers: '.$result->num_rows;?>
</div>


    <div style="
    position: absolute;
    top: 15%;
    left: 20px;
    width: 98%;">

        <div class="text-white row">

            <div class="col-md-12 col-lg-12">
                <div class="background-black p-4">

                    <?php

                    // -- LEFT JOIN ip_tables ON users.id = ip_tables.userID
                    // -- HAVING quantity > 0 ORDER BY quantity DESC";
                    // , COUNT(ip_tables.userID) AS quantity
                    //    GROUP BY users.id; 




                    // $a = date('d.m.Y H:i:s'); echo 'Current time '.$a;
                    ?>
                    <br>
                    <div class='user-row'>
                        <div class='id-width'>№</div>
                        <div class='id-width'>id</div>
                        <div class='user-data'>discordName</div>
                        <div class='user-data'>firstname</div>
                        <div class='user-data'>lastName</div>
                        <div class='user-data'>registrationDate</div>
                        <div class='user-data'>subscriptionDate</div>
                        <!-- <div class='user-data'>email</div>  <div class='user-data email'>" . $row["email"] . "</div>       -->

                    </div>
                    <?
                    $counter = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='user-row'>
                        <div class='id-width'>" . $counter . "</div>
                        <div class='id-width'>" . $row["id"] . "</div>
                        <div class='user-data discordName'>" . $row["discordName"] . "</div>
                        <div class='user-data firstname'>" . $row["firstname"] . "</div>
                        <div class='user-data lastName'>" . $row["lastName"] . "</div>
                        <div class='user-data lastName'>" . $row["registrationDate"] . "</div>                        
                        <div class='user-data subscriptionDate'>" . $row["subscriptionDate"] . "</div>
                        </div>";
                            $counter++;
                        }
                    } else {
                        echo "No results found.";
                    }

                    $connection->close();

                    ?>
                </div>
            </div>
        </div>

    <?
}
include "include/footer.php"; ?>
    <style>
        .background-black {
            background-color: black;
            opacity: 0.8;
        }

        a.about-page-links,
        a.about-page-links:hover {
            color: #f5d400;
        }

        .yellow {
            color: #f5d400;
            font-size: 18px;
        }

        .teal {
            color: #009999;
            font-size: 18px;
        }

        .pink {
            color: #ed5598;
        }
    </style>

    <style>
        .id-width {
            width: 20px;
            padding: 10px;
            margin-right: 25px;
        }

        .user-row {
            display: flex;
            flex-direction: row;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .user-data {
            flex: 1;
            padding: 10px;
            width: 200px;
        }

        .user-data.discordName {
            font-weight: bold;
        }

        .user-data.quantity {
            text-align: center;
        }
    </style>