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
                <span class="teal">How do I receive your services?</span>
                <br>If your interested view the <a class="about-page-links" href="https://www.tstohome.com/about.php">about page</a> and follow the steps outlined
                <br><br><span class="teal">How long does the subscription last for?</span>
                <br>Your subscription will be active for 30 days and renews each month automatically
                <br><br><span class="teal">Can I subscribe more than 1 month at a time?</span>
                <br>No need as once you subscribe the subscription will automatically renew each month
                <br><br><span class="teal">How can I cancel my subscription so it doesn't renew each month?</span>
                <br>Login into your PayPal account and cancel your subscription or message <span class="pink">@simpsonstapper</span> on our <a class="about-page-links" href="https://discord.gg/9sYXqGfyAC">Discord Server</a> to do it for you
                <br><br><span class="teal">I can't remember when my subscription ends. How can I find out?</span>
                <br>No problem! Log into our website and it will let you know. No longer need to ask
                <br><br><span class="teal">Once there is an update, how long before the mofified version is updated?</span>
                <br>Differs each time as some updates are very little work and others like THOH/XMAS events takes hours to write all the scripts. Usually always the same day and we always announce it
                <br><br><span class="teal">With every update, how do I know if it's an in-game update or if I have to download new apk files?</span>
                <br>Here is the breakdown. With mini-events, patch updates you will have to do nothing but restart your game to get the files. If there is a major event that is starting or ending you will have to download new apk files
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="background-black p-4">
                <span class="teal">Why don't donuts stick in the mod?</span>
                <br>Donuts will only stick with using the root files on a rooted Android device or Bluestacks. Awhile back donuts used to stick on apk mod but EA has disabled that option. The work around is to root your device which most are hesitant to do. If you have a PC the next best option is to install Bluestacks and root it. This will allow you to add unlimited donuts using the mod by scratching golden tickets. In the mod there is an option to add 1000 donuts by scratching 10 times golden scratchers.
                <br><br><span class="teal">How do I invite a member to your Discord server?</span>
                <br>Use this <a class="about-page-links" href="https://discord.gg/9sYXqGfyAC">Discord Server Link</a> to invite people to the server
                <br><br><span class="teal">It is not working, what do I do?</span>
                <br>Check to see if there was an update and if it needs to be updated. Check to see if your internet connection is steady. Reboot device. Clear cache
                <br><br><span class="teal">I keep getting the normal game, what do I do?</span>
                <br>Follow the <a class="about-page-links" href="https://www.tstohome.com/manual.php">instructions</a> outlined in the page. Methods 1-3 are most common to install and don't give you the normal game
                <br><br><span class="teal">I keep getting the bart screen, what do I do?</span>
                <br>Our services are IP restricted. Go on the website and assign your IP address with that specific device. You're allowed to have our services on multiple devices you use. Assigning your IP Address has been implemented for members to stop sharing files and or credentials
                <br><br><span class="teal">Why do certain jobs or quests show up on a normal game and not on the mod?</span>
                <br>Hundreds of them are disabled so when a giver is adding all old items there isn't 100's of popups showing up. If you had to do this for every account you would get frustrated and you wouldn't get many requests completed. Just remember this is a givers mod and if you want to play the game use the normal game. You can have both on your devices
            </div>
        </div>
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
            font-size: 16px;

        }

        .teal2 {
            color: #009999;

        }
    </style>