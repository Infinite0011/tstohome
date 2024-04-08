<? include "include/header.php";
include "include/config.php";
// echo $_SESSION['id'];
if (($_SESSION['id']==='46') || ($_SESSION['id']==='895') || ($_SESSION['id']==='901') ) {

    if ($_GET["userID"]){
        $deleteUser = "DELETE FROM ip_tables WHERE userID=".$_GET["userID"];
        $connection->query($deleteUser);
     }
?>
<div style="
    position: absolute;
    top: 5%;
    left: 20px;
    width: 98%;">

    <div class="text-white row">

        <div class="col-md-12 col-lg-12">
            <div class="background-black p-4">


                <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="business" value="sb-oghkc14323541@business.example.com">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="item_name" value="Monthly Subscription">
                <input type="hidden" name="item_number" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="currency_code" value="GBP">
                <input type="hidden" name="a3" id="paypalAmt" value="5">
                <input type="hidden" name="p3" id="paypalValid" value="1">
                <input type="hidden" name="t3" value="M">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="custom" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="cancel_return" value="https://www.tstohome.com/">
                <input type="hidden" name="return" value="https://www.tstohome.com/success_script.php">
                <input type="hidden" name="notify_url" value="https://www.tstohome.com/notify.php">
                <input class="buy-btn" type="submit" style="cursor: pointer; margin-top:13px;" value="Renew Your Subscription">
              </form> -->
                <?php
          
                // $sessionDate = $_SESSION['subscriptionDate'];
                // if (!empty($sessionDate)){$subscr_date = $sessionDate;} else{
                // $subscr_date = date("Y-m-d H:i:s"); }
                //  $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + 1 month", strtotime($subscr_date))); 
                //  echo $subscr_date_valid_to;
                // Assuming you have already established a database connection and stored the connection object in $connection

                $sql = "SELECT users.id, users.discordName, users.firstname, users.lastName, users.email, users.subscriptionDate, COUNT(ip_tables.userID) AS quantity
        FROM users
        LEFT JOIN ip_tables ON users.id = ip_tables.userID
        GROUP BY users.id
        HAVING quantity > 0 ORDER BY quantity DESC";
    

                $result = $connection->query($sql);
                ?>
                <div class='user-row'>
                <div class='id-width'>id</div>
                <div class='user-data'>discordName</div>
                <div class='user-data quantity'>quantity</div>
                <div class='user-data'>firstname</div>
                <div class='user-data'>lastName</div>
                <div class='user-data'>To delete</div>                
                <div class='user-data'>subscriptionDate</div>               
                <!-- <div class='user-data'>email</div>  <div class='user-data email'>" . $row["email"] . "</div>       -->
                
                </div>
                <?
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='user-row'>
                        <div class='id-width'>" . $row["id"] . "</div>
                        <div class='user-data discordName'>" . $row["discordName"] . "</div>
                        <div class='user-data quantity'>" . $row["quantity"] . "</div>
                        <div class='user-data firstname'>" . $row["firstname"] . "</div>
                        <div class='user-data lastName'>" . $row["lastName"] . "</div>
                        <div class='user-data subscriptionDate'><a href='show-users-with-ip.php?userID=".$row["id"]."'>delete</a></div>                      
                        <div class='user-data subscriptionDate'>" . $row["subscriptionDate"] . "</div>
                        </div>";
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
        .id-width{
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