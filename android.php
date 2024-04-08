<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
    include "include/currentuser.php";
} else {
    header('location:login.php');
}
include "include/header.php"; ?>
<div style="
    position: absolute;
    top: 5%;
    left: 20px;
    width: 98%;">

    <div class="text-white row">

        <div class="col-md-12 col-lg-6">
            <div class="background-black p-4">
                <div><span class="pink">Android Installation Methods: </span>(Ranked by success rate from users)
                    <br>Delete any previous versions of the game off your device before starting
                </div>
                <br><span class="teal">Method 1:</span>
                <br>- Download and install 64bit version only
                <br>- Open up and let the updates complete until the spinning donut vanishes
                <br><br><span class="teal">Method 2:</span>
                <br>- Download and install 32bit version only
                <br>- Open up and let the updates complete until the spinning donut vanishes
                <br>- Log into your game account and see if you get the modified version
                <br>- If you get the normal game install 64bit overtop
                <br>- Overtop means you’re not uninstalling 32bit version off your device
                <br>- You leave it and install 64bit version over 32bit
                <br>- Open up and let the updates complete until the spinning donut vanishes
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="background-black p-4">
                <span class="teal">Method 3:</span>
                <br>- Download and install 32bit version only
                <br>- Do not open 32bit version. Download and install 64bit overtop
                <br>- Overtop means you’re not uninstalling 32bit version, off your device
                <br>- You leave it and install 64bit version over 32bit
                <br>- Open up and let the updates complete until the spinning donut vanishes
                <br><br><span class="teal">Method 4:</span>
                <br>- Download and install 32bit version only
                <br>- Open up and let the updates complete until the spinning donut vanishes
                <br><br><span class="teal">Method 5:</span>
                <br>- Download and install 128bit version only
                <br>- Open up and let the updates complete until the spinning donut vanishes
                <br>- 128bit is 32bit and 64bit combined
                <div>
                    <!-- <br><span class="pink">"Donuts only stick with Golden Scratchers using the root files. In order to use these files you will need a rooted Android or Bluestacks"</span> -->
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="pink">
        <?= attentionDonuts(); ?>
    </div>

    <? include "include/footer.php"; ?>
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
    </style>