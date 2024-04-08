<? include "include/header.php"; ?>
<div style="
    position: absolute;
    top: 5%;
    left: 20px;
    width: 98%;">
    <div class="text-white row">
        <div class="col-md-12 col-lg-6">
            <div class="background-black p-4">
                <span class="teal">Discord Rules:</span> </span><a class="about-page-links" href="https://discord.gg/9sYXqGfyAC"> Click here to our Discord server </a>
                <br>1️⃣ Be respectful, civil, and welcoming. Don't be rude, laugh at others, or be a jerk<br>
                <br>2️⃣ No inappropriate or unsafe content (No advertisements or Spamming)<br>
                <br>3️⃣ Bullying is never tolerated<br>
                <br>4️⃣ Do not message another member without permission.<br> You can message<span class="yellow"> @Tapper</span> any time or ask any of the <span class="yellow">@Council</span> if their online if you can message them in private<br>
                <br>5️⃣ If anybody receives unwanted or disrespectful messages or sees anything that shouldn't be posted.<br>Please notify the <span class="yellow">@Council</span><br>
                <br>6️⃣ No asking for donuts or other game items<br>
                <br>7️⃣ Do not mention any other mods or tools in this server<br>
                <br>8️⃣ No sharing apk mod and/or our services, root files, or trying to profit from it.<br> Selling items from the game using our mod is forbidden. <br>It is also forbidden to sell accounts or sharing credentials to the website<br>
                <br>9️⃣ No Discord alt accounts allowed or sharing website credentials<br>
                <br>🔟 The most important one of course is to have fun!
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="background-black p-4">
                <span class="teal">Terms of Service</span>
                <br>1️⃣ By purchasing a subscription you agree to the following outlined Terms of Service
                <br>
                <br>2️⃣ By purchasing a subscription you will receive our services which include media content and files from TSTO Home
                <br>
                <br>3️⃣ Your subscription is for 30 days from the day it was purchased and auto-renews unless you cancel it on your end<br>
                <br>4️⃣ Subscriptions can be canceled by the Admin team if any of the Discord rules to the left are being violated in anyway<br>
                <br>5️⃣ If you're having any issues with your subscription message the owner <span class="yellow"> @Tapper</span> first before you put in a dispute as most concerns can be worked out with the member. If our services don't work we'll be happy to refund you. <br>Link to our Discord server is located on the top left of this page<br>
                <br>6️⃣ If a dispute is filed with PayPal or Patreon and <span class="yellow"> @Tapper</span> is not notified the claim will be disputed with said companies and you will no longer be able to receive our services<br>
                <br>7️⃣ TSTO Home is not affiliated with The Simpsons Tapped Out game or EA<br>
                <br>8️⃣ TSTO Home and its server staff are not responsible for your game or the accounts you log in using our services<br>
            </div>
        </div>
    </div>

    <div class="pink">
        <?= attentionTerms(); ?>
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

        .teal2 {
            color: #009999;

        }

        .pink {
            color: #ed5598;
        }
    </style>