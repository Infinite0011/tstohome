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
        <div class="col-md-12 col-lg-12">
            <div class="background-black p-4 text-left">
                <span class="pink">Current event folder name:</span>
                4_66_TheGreatBurnsby_Patch2_EFRVOZTY0XU1 <span class="pink">Version: </span>4.66.5
                <br>gamescripts-r494653-B2Z190Y7 <span class="pink">- </span>textpools-en-r494653-B2Z190Y7<br><br>
                 Watch our video on how to <a class="about-page-links" href="https://youtu.be/HbFgJXo5f3E">Root BlueStacks and Install TSTO Mod</a> or read the tutorial below<br>
                <span class="white" style="margin-top: 10px;"><br>
                <span class="teal">How do I root my BlueStacks and play the modified version of the game?</span>
                <br>If you're interested you will have to complete the following steps using a PC<br>
                <br>1️⃣ Download and install the latest version of BlueStacks from <a class="about-page-links" href="https://www.tstohome.com/">our website</a>. Click on the Bart BlueStacks button on the far right corner. In order to see these files you will need to be registered and have an active subscription<br>
                <img src="https://www.tstohome.com/images/bluestacks/1.png" alt="" width="900" height="80"><br>
                <br>2️⃣ Click on Customize installation and choose the drive that you have the most space in<br>
                <img src="https://www.tstohome.com/images/bluestacks/2_1.png" alt="" width="450" height="250"><br>
                <br>3️⃣ Click on Install now<br>
                <img src="https://www.tstohome.com/images/bluestacks/2.png" alt="" width="900" height="80"><br>
                <br>4️⃣ Once BlueStacks has been installed close it and download the most current version of Notepad ++ from  <a class="about-page-links" href="https://notepad-plus-plus.org/downloads/">here</a><br>
                <img src="https://www.tstohome.com/images/bluestacks/3.png" alt="" width="900" height="160"><br>
                <br>5️⃣ Next open up your Windows Explorer and click on View on the top bar then Show > Hidden Items. Ensure it has a check mark beside it. Now go to the folder you installed BlueStacks. Same as the BlueStacks data path that is above. So mine is D:\Program Files\BlueStacks_nxt. This file can be in either ProgramFiles or ProgramData folder so check both
                <br><img src="https://www.tstohome.com/images/bluestacks/4.png" alt="" width="900" height="500"><br>
                <br>6️⃣ Open up bluestacks.conf using Notepad++ and click on Search > Find or Ctrl+F and type in root and click on Find Next 
                <br><img src="https://www.tstohome.com/images/bluestacks/5.png" alt="" width="900" height="500"><br>
                <br>7️⃣ Change bst.instance.Pie64.enable_root_access="0" to bst.instance.Pie64.enable_root_access="1" and bst.feature.rooting="0" to bst.feature.rooting="1" and save. If yours says Nougat32 that's okay, just change the 0 to 1 and save. Close Notepad++
                <br><img src="https://www.tstohome.com/images/bluestacks/6.png" alt="" width="900" height="500"><br>
                <br>8️⃣ Open up BlueStacks 5. If you don't have an icon for it open up BlueStacks X and click on the second last icon on the bottom left called App Player 
                <br><img src="https://www.tstohome.com/images/bluestacks/7.png" alt="" width="900" height="500"><br>
                <br>9️⃣ Click on System apps & then Play Store 
                <br><img src="https://www.tstohome.com/images/bluestacks/8.png" alt="" width="900" height="300"><br>
                <br>1️⃣0️⃣ Sign into Google Play using your Gmail account 
                <br><img src="https://www.tstohome.com/images/bluestacks/9.png" alt="" width="900" height="300"><br>
                <br>1️⃣1️⃣ Once signed in type root checker and press enter in the top search bar where it says Search for apps & games 
                <br><img src="https://www.tstohome.com/images/bluestacks/10.png" alt="" width="900" height="215"><br>
                <br>1️⃣2️⃣ Click on Install and then Open 
                <br><img src="https://www.tstohome.com/images/bluestacks/11.png" alt="" width="900" height="300"><br>
                <br>1️⃣3️⃣ Click on Agree to the Disclaimer & Get Started 
                <br><img src="https://www.tstohome.com/images/bluestacks/12.png" alt="" width="900" height="300"><br>
                <br>1️⃣4️⃣ Click on Verify Root 
                <br><img src="https://www.tstohome.com/images/bluestacks/13.png" alt="" width="900" height="300"><br><br>
                If you get a congratulations, you have successfully rooted your BlueStacks and have followed the steps above correctly 
                <br><img src="https://www.tstohome.com/images/bluestacks/13_2.png" alt="" width="900" height="300"><br>
                <br>1️⃣5️⃣ Click on the Home icon on the bottom right of BlueStacks. Then click on System apps and back to the Google Play Store. Type Tapped Out and click on Install and after Play 
                <br><img src="https://www.tstohome.com/images/bluestacks/14.png" alt="" width="900" height="300"><br>
                <br>1️⃣6️⃣ Enter Month & Year you were born, check off I have read and accept the agreement and press Confirm
                <br><img src="https://www.tstohome.com/images/bluestacks/15.png" alt="" width="900" height="300"><br>
                <br>1️⃣7️⃣ Click on Allow 
                <br><img src="https://www.tstohome.com/images/bluestacks/16.png" alt="" width="900" height="300"><br>
                <br>1️⃣8️⃣ Let the bottom right donut finish the updates until it disappears 
                <br><img src="https://www.tstohome.com/images/bluestacks/17.png" alt="" width="900" height="300"><br>
                <br>1️⃣9️⃣ Once updates are done click on the Home icon on the bottom right and then System apps and back to the Google Play Store to install FX File Explorer
                <br><img src="https://www.tstohome.com/images/bluestacks/18_1.png" alt="" width="900" height="300"><br>
                <br>2️⃣0️⃣ Click on Install & Open
                <br><img src="https://www.tstohome.com/images/bluestacks/18_2.png" alt="" width="900" height="300"><br>
                <br>2️⃣1️⃣ Click on Accept at the bottom right for the License Agreement 
                <br><img src="https://www.tstohome.com/images/bluestacks/19.png" alt="" width="900" height="300"><br>
                <br>2️⃣2️⃣ Click on Allow for FX to access your files 
                <br><img src="https://www.tstohome.com/images/bluestacks/20.png" alt="" width="900" height="300"><br>
                <br>2️⃣3️⃣ Click and drag to the left on the screen 
                <br><img src="https://www.tstohome.com/images/bluestacks/21.png" alt="" width="900" height="300"><br>
                <br>2️⃣4️⃣ Scroll all the way to the end and uncheck Start a 7-day trial of FX Plus now and click on the green round button 
                <br><img src="https://www.tstohome.com/images/bluestacks/22.png" alt="" width="900" height="300"><br>
                <br>2️⃣5️⃣ Click on Settings 
                <br><img src="https://www.tstohome.com/images/bluestacks/23.png" alt="" width="900" height="300"><br>
                <br>2️⃣6️⃣ Scroll down until you reach Developer section and click on Developer/Root 
                <br><img src="https://www.tstohome.com/images/bluestacks/24.png" alt="" width="900" height="300"><br>
                <br>2️⃣7️⃣ Check off that you understand the risk and click on OK 
                <br><img src="https://www.tstohome.com/images/bluestacks/25.png" alt="" width="900" height="300"><br>
                <br>2️⃣8️⃣ Click on the back button on the top left near Settings 
                <br><img src="https://www.tstohome.com/images/bluestacks/26.png" alt="" width="900" height="300"><br>
                <br>2️⃣9️⃣ Click on System (Root) 
                <br><img src="https://www.tstohome.com/images/bluestacks/27.png" alt="" width="900" height="300"><br>
                <br>3️⃣0️⃣ Click on OK 
                <br><img src="https://www.tstohome.com/images/bluestacks/28.png" alt="" width="900" height="300"><br>
                <br>3️⃣1️⃣ Click on the Data folder
                <br><img src="https://www.tstohome.com/images/bluestacks/29.png" alt="" width="900" height="300"><br>
                <br>3️⃣2️⃣ Click on the Data folder
                <br><img src="https://www.tstohome.com/images/bluestacks/30.png" alt="" width="900" height="300"><br>
                <br>3️⃣3️⃣ Click on the com.ea.game.simpsons4_na or row folder
                <br><img src="https://www.tstohome.com/images/bluestacks/31.png" alt="" width="900" height="300"><br>
                <br>3️⃣4️⃣ Click on the Files folder
                <br><img src="https://www.tstohome.com/images/bluestacks/32.png" alt="" width="900" height="300"><br>
                <br>3️⃣5️⃣ Click on the DLC folder
                <br><img src="https://www.tstohome.com/images/bluestacks/33.png" alt="" width="900" height="300"><br>
                <br>3️⃣6️⃣ Scroll all the way to the bottom and click on the 4_64_ColdTurkey_1JUH53QQVXHX folder
                <br>Reminder this folder changes with each update. So what you are viewing today may not be the same in the future as updates happen every 2 to 5 weeks
                <br><img src="https://www.tstohome.com/images/bluestacks/34.png" alt="" width="900" height="300"><br>
                <br>3️⃣7️⃣ Click on the textpools-en-r492105-H4SZ59VL folder
                <br><img src="https://www.tstohome.com/images/bluestacks/35.png" alt="" width="900" height="300"><br>
                <br>3️⃣8️⃣ Click on file 0 and hold until it is highlighted. Also highlight file 1 and click on Delete on the top right corner
                <br><img src="https://www.tstohome.com/images/bluestacks/36.png" alt="" width="900" height="300"><br>
                <br>3️⃣9️⃣ Click the check box on the left and click on Delete
                <br><img src="https://www.tstohome.com/images/bluestacks/37.png" alt="" width="900" height="300"><br>
                <br>4️⃣0️⃣ Go back to main event folder by clicking on 4_64_ColdTurkey_1JUH53QQVXHX at the top
                <br><img src="https://www.tstohome.com/images/bluestacks/38.png" alt="" width="900" height="300"><br>
                <br>4️⃣1️⃣ Click on the gamescripts-r492105-H4SZ59VL folder
                <br><img src="https://www.tstohome.com/images/bluestacks/39.png" alt="" width="900" height="300"><br>
                <br>4️⃣2️⃣ Click on Split View
                <br><img src="https://www.tstohome.com/images/bluestacks/40.png" alt="" width="900" height="300"><br>
                <br>4️⃣3️⃣ Click on Recent
                <br><img src="https://www.tstohome.com/images/bluestacks/41.png" alt="" width="900" height="300"><br>
                <br>4️⃣4️⃣ Now you are ready to move the root files over to the Recently Updated folder
                <br><img src="https://www.tstohome.com/images/bluestacks/42.png" alt="" width="900" height="300"><br>
                <br>4️⃣5️⃣ Download the latest root files from <a class="about-page-links" href="https://www.tstohome.com/">our website</a>. Click on the Marge Root Files button in the middle. In order to see these files you will need to be registered and have an active subscription
                <br><img src="https://www.tstohome.com/images/bluestacks/43.png" alt="" width="900" height="80"><br>
                <br>4️⃣6️⃣ Locate root.zip file that you have downloaded in Windows Explorer. Right click on it and click on Extract All or if you have <a class="about-page-links" href="https://www.win-rar.com/download.html?&L=0">WinRAR</a> or <a class="about-page-links" href="https://download.winzip.com/gl/gad/winzip28.exe">WinZip</a> click on Extract to root\
                <br><img src="https://www.tstohome.com/images/bluestacks/44.png" alt="" width="900" height="300"><br>
                <br>4️⃣7️⃣ Click on Extract
                <br><img src="https://www.tstohome.com/images/bluestacks/45.png" alt="" width="650" height="400"><br>
                <br>4️⃣8️⃣ Once you have extracted the root.zip file highlight 0 and 1 files
                <br><img src="https://www.tstohome.com/images/bluestacks/46.png" alt="" width="900" height="165"><br>
                <br>4️⃣9️⃣ Drag and Drop both files into the Recently Updated section
                <br><img src="https://www.tstohome.com/images/bluestacks/47.png" alt="" width="900" height="300"><br>
                <br>5️⃣0️⃣ Click on the 3 dots located on the top right hand corner
                <br><img src="https://www.tstohome.com/images/bluestacks/48.png" alt="" width="900" height="300"><br>
                <br>5️⃣1️⃣ Click on Refresh
                <br><img src="https://www.tstohome.com/images/bluestacks/49.png" alt="" width="900" height="300"><br>
                <br>5️⃣2️⃣ Click on file 0 and hold until it is highlighted. Also highlight file 1 and click on the cut icon (scissors) at the top
                <br><img src="https://www.tstohome.com/images/bluestacks/50.png" alt="" width="900" height="300"><br>
                <br>5️⃣3️⃣ Click on a empty spot in the gamescripts section below 0 and 1 files. You will notice the cut icon (scissors) move to the left. Click on the cut icon (scissors)
                <br><img src="https://www.tstohome.com/images/bluestacks/51.png" alt="" width="900" height="300"><br>
                <br>5️⃣4️⃣ Click on Paste at the bottom
                <br><img src="https://www.tstohome.com/images/bluestacks/52.png" alt="" width="900" height="300"><br>
                <br>5️⃣5️⃣ Click on OK
                <br><img src="https://www.tstohome.com/images/bluestacks/53.png" alt="" width="900" height="300"><br>
                <br>5️⃣6️⃣ Click on the Recent apps icon at the bottom right hand corner. Click on Clear All
                <br><img src="https://www.tstohome.com/images/bluestacks/54.png" alt="" width="900" height="300"><br>
                <br>5️⃣7️⃣ Click on the Tapped Out icon
                <br><img src="https://www.tstohome.com/images/bluestacks/55.png" alt="" width="900" height="300"><br>
                <br>5️⃣8️⃣ Log into your account
                <br><img src="https://www.tstohome.com/images/bluestacks/56.png" alt="" width="900" height="300"><br>
                <br>Enjoy our services and happy tapping. Any issues or questions feel free to ask in our TSTO Home <a class="about-page-links" href="https://discord.gg/9sYXqGfyAC">Discord server</a>
                <br><img src="https://www.tstohome.com/images/bluestacks/57.png" alt="" width="900" height="300"><br>
                <br><img src="https://www.tstohome.com/images/bluestacks/58.png" alt="" width="900" height="300"><br>
                 </span>
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
            color: #009999;
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