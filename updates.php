<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<div id="overlay" style="z-index: 5;" onclick="closeZoom(this)"></div>
<div class="loading-screen">
    <div class="loader"></div>
</div>
<div style="
    position: absolute;
    top: 10px;
    left: 20px;
    width: 98%;">

    <div class="text-white row">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="textSearch" aria-describedby="textSearch" placeholder="Search..." onkeyup="searchItem(this.value)" style="height: 100%;">
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="card" style="height: 100%;background-color:#000000c4;border-color:white">
                        <div class="card-header bg-dark" style="font-size: 1.1vw;">
                            Total Items Count : Buildings <span style="color: orange;margin-right:20px" id="total-buildings"></span> Characters <span style="color: orange;margin-right:20px" id="total-characters"></span> Decorations <span style="color: orange;margin-right:20px" id="total-decorations"></span> Skins <span style="color: orange;margin-right:20px" id="total-skins"></span> Total Items <span style="color: orange;margin-right:20px" id="total-items"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="card" style="height: 100%;background-color:#000000c4;border-color:white">
                        <div class="card-header bg-dark">
                            Content Update Names
                        </div>
                        <div class="card-body">
                            <ul class="list-group" id="content-update-names" style="color: black;">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background-color:#000000c4;border-color:white">
                                <div class="card-header bg-dark">
                                    Categories
                                </div>
                                <div class="card-body">
                                    <ul class="list-group" id="categories" style="color: black;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="card" style="height: 100%;background-color:#000000c4;border-color:white">
                                <div class="card-header bg-dark">
                                    Name of Items
                                </div>
                                <div class="card-body" style="height: 300px;">
                                    <ul class="list-group" id="name-of-items" style="color: black;height:250px">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background-color:#000000c4;border-color:white">
                                <div class="card-header bg-dark">
                                    Image of Item - <span class="pink">(Click on Image to Enlarge) 👇</span>
                                </div>
                                <div class="card-body text-center">
                                    <!-- <img id="image-of-item" style="visibility: hidden;" src="" alt="Placeholder Image" width="150" height="150"> -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <!-- <div class="carousel-item active">
                                                <img id="image-of-item" src="https://drive.google.com/uc?id=1ii93KbfysARxr5cszk7i8MshTUtWFp66" class="d-block" width="150" height="150" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://drive.google.com/uc?id=1vddbVq3w-bGGU_1qon1BYPg3shlCWoW9" class="d-block" width="150" height="150" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://drive.google.com/uc?id=1qyG5ZRgLKbkFdqY1wmjrcposC2e165lj" class="d-block" width="150" height="150" alt="...">
                                            </div> -->
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 20px;">
                            <div class="card" style="background-color:#000000c4;border-color:white">
                                <div class="card-header bg-dark">
                                    Image of Menu
                                </div>
                                <div class="card-body text-center">
                                    <img id="image-of-menu" style="visibility: hidden;" src="" alt="Placeholder Image" width="150" height="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 20px;">
                            <div class="card" style="background-color:#000000c4;border-color:white">
                                <div class="card-body text-dark">
                                    <table style="color: white;">
                                        <tr>
                                            <td>ID:</td>
                                            <td><span id="item-id"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Filename:</td>
                                            <td><span id="item-filename"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Unique:</td>
                                            <td><span id="item-unique"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Paired:</td>
                                            <td><span id="item-comes-with"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<? include "include/footer.php"; ?>

<style>
    .list-group {
        max-height: 500px;
        /* Sesuaikan tinggi maksimal sesuai kebutuhan */
        overflow-y: auto;
    }

    /* Gaya untuk item daftar */
    .list-group-item {
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Gaya saat mengarahkan kursor ke item daftar */
    .list-group-item:hover {
        background-color: lightgray;
    }

    /* Gaya saat item daftar aktif */
    .active {
        background-color: #343a40 !important;
        /* Ganti latar belakang saat item aktif */
    }

    /* styles.css */
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .content {
        display: none;
        /* Add your content styles here */
    }

    #carouselExampleControls {
        text-align: center;
    }

    .carousel-inner {
        display: inline-block;
    }

    .carousel-item img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        background-color: transparent;
        /* Menghapus warna latar belakang */
    }

    .carousel-item.active {
        background-color: transparent !important;
        /* Remove background-color for active item */
    }



    /*img {*/
    /*    height: 100px;*/
    /*}*/

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8) none 50% / contain no-repeat;
        cursor: pointer;
        transition: 0.3s;

        visibility: hidden;
        opacity: 0;
    }

    #overlay.open {
        visibility: visible;
        opacity: 1;
    }

    #overlay:after {
        /* X button icon */
        content: "\2715";
        position: absolute;
        color: #fff;
        top: 10px;
        right: 20px;
        font-size: 2em;
    }
</style>

<script>
    let contentUpdateNames = '';
    let category = '';
    let itemDatas = '';

    // Fungsi untuk menangani klik pada item daftar
    function toggleActive(event, listId, value = null) {
        emptyItem()

        if (listId == 'categories') {
            category = value;
            loadNameOfItems(value)
        }

        if (listId == 'name-of-items') {
            setItem(value)
        }

        // Dapatkan daftar dengan ID yang sesuai
        var list = document.getElementById(listId);

        // Jika yang diklik adalah "content-update-names", reset "categories"
        if (listId === 'content-update-names') {
            contentUpdateNames = value;
            loadCategories(value)
            removeActiveCategory();

            var ul = document.getElementById("name-of-items");

            // Remove all child elements (list items) from the <ul>
            while (ul.firstChild) {
                ul.removeChild(ul.firstChild);
            }
        }

        // Jika yang diklik adalah "categories", reset "name-of-items"
        if (listId === 'categories') {
            var ul = document.getElementById("name-of-items");

            // Remove all child elements (list items) from the <ul>
            while (ul.firstChild) {
                ul.removeChild(ul.firstChild);
            }
        }

        // Hapus kelas "active" dari semua item daftar di daftar yang diklik
        var items = list.querySelectorAll(".list-group-item");
        items.forEach(function(item) {
            item.classList.remove("active");
        });

        // Tambahkan kelas "active" ke item yang diklik
        event.target.classList.add("active");
    }

    function loadNameOfItems(value) {
        // Show loading screen
        $('.loading-screen').show();
        $.ajax({
            url: 'data/nameOfItems.php',
            method: 'POST',
            dataType: 'json',
            data: {
                category: category,
                content: contentUpdateNames
            },
            success: function(data) {
                // Hide loading screen
                $('.loading-screen').hide();
                var list = $('#name-of-items');
                if (data && data.length > 0) {
                    itemDatas = data;
                    $.each(data, function(index, item) {
                        list.append(`<li class="list-group-item" style="color:white;background-color:#00000000  ;border-color:white" onclick="toggleActive(event, 'name-of-items', ${item.id})">${item.game_title}</li>`);
                    });
                } else {
                    list.append('<li style="color:white">No items found</li>');
                }
            },
            error: function() {
                alert('Error loading JSON data.');
            }
        });
    }

    function loadCategories(value) {
        var list = $('#categories');
        // Show loading screen
        $('.loading-screen').show();
        $.ajax({
            url: 'data/categories.php',
            method: 'POST',
            dataType: 'json',
            data: {
                item_id: value
            },
            success: function(data) {
                list.empty();
                // Hide loading screen
                $('.loading-screen').hide();

                if (data && data.length > 0) {
                    $.each(data, function(index, item) {
                        list.append(`<li class="list-group-item" style="color:white;background-color:#00000000  ;border-color:white" onclick="toggleActive(event, 'categories', ${item.id})">${item.category}</li>`);
                    });
                } else {
                    list.append('<li style="color:white">No items found</li>');
                }
            },
            error: function() {
                alert('Error loading JSON data.');
            }
        });
    }

    function setItem(value) {
        const item = itemDatas.find(obj => obj.id == value);
        let imageOfItem = item.game_image;
        let imageOfMenu = item.menu_image;
        let itemId = item.item_id;
        let fileName = item.name;
        let unique = item.unique_code;
        let comesWith = item.comes_with;

        // Get a reference to the image element by its ID
        var imageOfItemElement = document.getElementById("image-of-item");
        var imageOfMenuElement = document.getElementById("image-of-menu");

        // Split the string into an array based on the comma (`,`) separator
        const gameImageArray = imageOfItem.split(',');

        // Add carousel items dynamically
        for (var i = 0; i < gameImageArray.length; i++) {
            var activeClass = i === 0 ? 'active' : '';
            var carouselItem = $('<div class="carousel-item ' + activeClass + '">');
            var image = $('<img onclick="zoom(this)" id="image-of-item" width="150" height="150" alt="...">');
            
            var baseUrlImage = gameImageArray[i];
            
            // Mengganti bagian path dan menambahkan parameter 'sz=w1000'
            var newImageUrl = baseUrlImage.replace("/uc?", "/thumbnail?") + "&sz=w1000";
            
            image.attr('src', newImageUrl);
            carouselItem.append(image);
            $('.carousel-inner').append(carouselItem);
        }
        
        
            
        // Mengganti bagian path dan menambahkan parameter 'sz=w1000'
        var newImageMenuUrl = imageOfMenu.replace("/uc?", "/thumbnail?") + "&sz=w1000";

        // Set the new source URL for the image
        // imageOfItemElement.src = imageOfItem;
        imageOfMenuElement.src = newImageMenuUrl;

        // imageOfItemElement.style.visibility = "visible";
        imageOfMenuElement.style.visibility = "visible";

        var idElement = document.getElementById("item-id");
        var fileNameElement = document.getElementById("item-filename");
        var uniqueElement = document.getElementById("item-unique");
        var comesWithElement = document.getElementById("item-comes-with");
        idElement.textContent = itemId;
        fileNameElement.textContent = fileName;
        uniqueElement.textContent = unique;
        comesWithElement.textContent = comesWith;
    }

    function emptyItem() {
        $('.carousel-inner').empty();
        // var imageOfItemElement = document.getElementById("image-of-item");
        var imageOfMenuElement = document.getElementById("image-of-menu");
        // imageOfItemElement.src = '';
        imageOfMenuElement.src = '';
        // imageOfItemElement.style.visibility = "hidden";
        imageOfMenuElement.style.visibility = "hidden";

        var idElement = document.getElementById("item-id");
        var fileNameElement = document.getElementById("item-filename");
        var uniqueElement = document.getElementById("item-unique");
        var comesWithElement = document.getElementById("item-comes-with");
        idElement.textContent = '';
        fileNameElement.textContent = '';
        uniqueElement.textContent = '';
        comesWithElement.textContent = '';
    }

    function removeActiveContent() {
        var contentList = document.getElementById('content-update-names');
        var contentItems = contentList.querySelectorAll(".list-group-item");
        contentItems.forEach(function(item) {
            item.classList.remove("active");
        });
    }

    function removeActiveCategory() {
        var categoriesList = document.getElementById('categories');
        var categoriesItems = categoriesList.querySelectorAll(".list-group-item");
        categoriesItems.forEach(function(item) {
            item.classList.remove("active");
        });
    }

    function searchItem(val) {
        var list = $('#name-of-items');


        if (val) {
            $.ajax({
                url: 'data/nameOfItemsSearch.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    search: val
                },
                success: function(data) {
                    list.empty();
                    emptyItem();
                    removeActiveContent();
                    removeActiveCategory();
                    if (data && data.length > 0) {
                        itemDatas = data;
                        $.each(data, function(index, item) {
                            list.append(`<li class="list-group-item" style="color:white;background-color:#00000000  ;border-color:white" onclick="toggleActive(event, 'name-of-items', ${item.id})">${item.game_title}</li>`);
                        });
                    } else {
                        list.append('<li style="color:white">No items found</li>');
                    }
                },
                error: function() {
                    alert('Error loading JSON data.');
                }
            });
        } else {
            list.empty();
            emptyItem();
            removeActiveContent();
            removeActiveCategory();
        }

    }
</script>

<script>
    function zoom(res) {

        $('#overlay')
            .css({
                backgroundImage: `url(${res.src})`
            })
            .addClass('open')
            .one('click', function() {
                $(res).removeClass('open');
            });
    }

    function closeZoom(res){
            $(res).removeClass('open');
    }

    $(document).ready(function() {
        // document.addEventListener('contextmenu', function (e) {
        //     e.preventDefault();
        // });

        // document.addEventListener('dragstart', function (e) {
        //     e.preventDefault();
        // });



        // Show loading screen
        $('.loading-screen').show();
        $.ajax({
            url: 'data/contentUpdateNames.php',
            dataType: 'json',
            success: function(data) {
                // Hide loading screen
                $('.loading-screen').hide();

                if (data && data.length > 0) {
                    var list = $('#content-update-names');
                    $.each(data, function(index, item) {
                        list.append(`<li class="list-group-item" style="color:white;background-color:#00000000  ;border-color:white" onclick="toggleActive(event, 'content-update-names', ${item.id})">${item.content}</li>`);
                    });
                } else {
                    list.append('<li style="color:white">No items found</li>');
                }
            },
            error: function() {
                alert('Error loading JSON data.');
            }
        });


        $.ajax({
            url: 'data/countItems.php',
            dataType: 'json',
            success: function(data) {
                // Hide loading screen
                $('.loading-screen').hide();

                if (data && data.length > 0) {
                    var countBuildingsElement = document.getElementById("total-buildings");
                    var countCharactersElement = document.getElementById("total-characters");
                    var countDecorationsElement = document.getElementById("total-decorations");
                    var countSkinsElement = document.getElementById("total-skins");
                    var countItemsElement = document.getElementById("total-items");
                    countBuildingsElement.textContent = data[0].buildings;
                    countCharactersElement.textContent = data[0].characters;
                    countDecorationsElement.textContent = data[0].decorations;
                    countSkinsElement.textContent = data[0].skins;
                    countItemsElement.textContent = parseInt(data[0].buildings) + parseInt(data[0].characters) + parseInt(data[0].decorations) + parseInt(data[0].skins);

                    // console.log(data[0].buildings, 'data')
                    // var list = $('#content-update-names');
                    // $.each(data, function(index, item) {
                    //     list.append(`<li class="list-group-item" style="color:white;background-color:#00000000  ;border-color:white" onclick="toggleActive(event, 'content-update-names', ${item.id})">${item.content}</li>`);
                    // });
                }
            },
            error: function() {
                alert('Error loading JSON data.');
            }
        });


        // Image to Lightbox Overlay 
        $('img').on('click', function() {
            console.log('test')
            $('#overlay')
                .css({
                    backgroundImage: `url(${this.src})`
                })
                .addClass('open')
                .one('click', function() {
                    $(this).removeClass('open');
                });
        });

    });
</script>