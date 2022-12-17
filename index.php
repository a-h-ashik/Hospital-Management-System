<?php
    require "./utility/header.php";

    if (isset($_SESSION['user_id'])) {
        $session_set = TRUE;
    }
    else {
        $session_set = FALSE;
    }
?>
  
<head>
    <link rel="stylesheet" href="./css/index.css">
</head>

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="./images/carousel/carousel-0.jpg" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div> -->
            </div>
            <div class="carousel-item">
            <img src="./images/carousel/carousel-1.jpg" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div> -->
            </div>
            <div class="carousel-item">
            <img src="./images/carousel/carousel-2.jpg" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div> -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="sevrice">
        <div class="service-tittle">
            <span>Our</span>
            <span class="colored">Services</span>
        </div>
        <div class="service-catagory">
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">medical_services</span>
                </div>
                <div class="card-tittle">Treatment</div>
                <div class="card-text">We serve 24 hours a day</div>
            </div>
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">vaccines</span>
                </div>
                <div class="card-tittle">Pharmacy</div>
                <div class="card-text">We have 24 hours pharmacy support</div>
            </div>
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">science</span>
                </div>
                <div class="card-tittle">LAB Facilities</div>
                <div class="card-text">We have every kind of modern equipments</div>
            </div>
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">e911_emergency</span>
                </div>
                <div class="card-tittle">Emergency Care</div>
                <div class="card-text">We give emergency care 7 days a week</div>
            </div>
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">bloodtype</span>
                </div>
                <div class="card-tittle">Blood Bank</div>
                <div class="card-text">We have our own blood bank</div>
            </div>
            <div class="card-mod">
                <div class="card-logo">
                <span class="material-symbols-outlined">loupe</span>
                </div>
                <div class="card-tittle">Operation Theater</div>
                <div class="card-text">Well-equipped OT to address all emergencies Conducting successful operations</div>
            </div>
        </div>
    </div>


    <div class="news-section">
        <div class="news-section-left">
            <div class="news-media-tittle">
                <span>News</span>
                <span class="colored">& Media</span>
            </div>
            <?php 
            $sql = "SELECT * FROM news ORDER BY new_date DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            while ($news = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>

            <div class="news-card">
                <div class="news-image">
                    <img src="./images/<?php echo $news['new_image'] ?>">
                </div>
                <div class="news-content">
                    <a href="news & media.php?new_name=<?php echo $news['new_name'] ?>"><div class="news-tittle">
                    <?php echo $news['new_name']; ?>
                    </div></a>
                    <div class="news-date">
                    <?php 
                        $date = date_create($news['new_date']);
                        echo date_format($date, 'M d, Y');
                    ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="news-section-right">
            <div class="news-media-tittle">
                <span>Happy</span>
                <span class="colored">Patients</span>
            </div>

            <?php 
            $sql = "SELECT * FROM stories ORDER BY sto_date DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            while ($story = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>

            <div class="news-card">
                <div class="news-image">
                    <img src="./images/<?php echo $story['sto_image'] ?>">
                </div>
                <div class="news-content">
                    <a href="happy_patient.php?sto_name=<?php echo $story['sto_name'] ?>"><div class="news-tittle">
                        <?php echo $story['sto_name']; ?></div></a>
                    <div class="news-date">
                        <?php 
                        $date = date_create($story['sto_date']);
                        echo date_format($date, 'M d, Y');
                        ?>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    
    </div>

<?php
 require "./utility/footer.php"
?>