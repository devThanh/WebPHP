<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            background-color: #e6eaed !important;
        }

        .carousel {
            background: rgba(0, 0, 0, 0.5);
        }





        .carousel-caption {
            text-align: left;
            margin-bottom: 30%;

        }

        .booking {
            position: relative;
            margin-top: -60px !important;
            z-index: 1;
        }



        .back-to-top {
            position: fixed;
            right: 45px;
            bottom: 45px;
            z-index: 10;
        }

        a {
            text-decoration: none;
        }

        .card-img {
            height: 300px;
        }
    </style>
</head>

<body>
    <?php require_once('./db/dbhelper.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <!--Carousel start-->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://carshop.vn/wp-content/uploads/2022/07/hinh-nen-xe-oto-dep-44.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block p-3 text-start">
                    <h5>FIND YOUR DREAM CAR</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="p5 my-3">
                        <h4>MODEL 2022</h4><button type="button" class="btn btn-success btn-sm">Buy Now</button>
                    </div>

                    <button type="button" class="btn btn-success btn-lg">Book Now</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://carshop.vn/wp-content/uploads/2022/07/hinh-nen-xe-oto-dep-35.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block p-3 text-start">
                    <h5>FIND YOUR DREAM CAR</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="p5 my-3">
                        <h4>MODEL 2022</h4><button type="button" class="btn btn-success btn-sm">Buy Now</button>
                    </div>

                    <button type="button" class="btn btn-success btn-lg">Book Now</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://carshop.vn/wp-content/uploads/2022/07/hinh-nen-xe-oto-dep-22.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block p-3 text-start">
                    <h5>FIND YOUR DREAM CAR</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="p5 my-3">
                        <h4>MODEL 2022</h4><button type="button" class="btn btn-success btn-sm">Buy Now</button>
                    </div>

                    <button type="button" class="btn btn-success btn-lg">Book Now</button>
                </div>
            </div>
        </div>

    </div>
    <!--Carousel end-->


    <!--Booking start-->
    <div class="container-fluid booking">
        <div class="container">
            <form method="GET" action="" class="row g-3 mx-3 py-3 px-3 align-items-center justify-content-around bg-light shadow">
                <div class="col-auto">
                    <label for="floatingSelect">MẪU XE</label>
                    <select onChange="myNewFunction(this);" class="form-select" id="floatingSelect" aria-label="Floating label select example" name="modelCar">
                        <option selected value="">Chọn mẫu xe</option>

                        <!-- <option value=""></option> -->
                        <?php
                        $sql          = 'select * from category';
                        $categoryList = executeResult($sql);
                        foreach ($categoryList as $item) {
                            echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                        }
                        ?>


                    </select>

                </div>


                <div class="col-auto">
                    <label for="customRange2" class="form-label">GIÁ XE</label>
                    <input type="range" class="form-range" min="100" max="500" name="range" id="customRange2">
                </div>
                <div class="col-auto">
                    <label for="search">TÌM KIẾM</label>
                    <input id="search" class="form-control" name="search" type="text" />
                </div>

                <div class="col-auto">
                    <button class="btn btn-primary mt-4" style="width: 100px;" name="submit">Submit</button>
                    <!-- <a class="btn btn-primary mt-4 btn-submit" style="width: 100px;" >Submit</a> -->
                </div>
            </form>
        </div>
    </div>
    <!--Booking end-->


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3">Car</h5>
                <h1 class="text-secondary">Our Car</h1>
            </div>
            <div class="row">
                <?php
                //include "./db/dbhelper.php";
                if (empty($_GET['search']) && $_GET['modelCar'] == '') {
                    $sql = "select * from product ";
                    //execute($sql);
                    $productList = executeResult($sql);
                } else {

                    $key = $_GET['search'];
                    $model = $_GET['modelCar'];
                    $rangeprice = $_GET['range'];
                    $sql1 = "select * from product where title like '%$key%' and id_category = $model and price <= $rangeprice";
                    $productList = executeResult($sql1);
                    // var_dump($model, $productList);
                }

                foreach ($productList as $item) {
                    echo '
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <div class="card">
                        <img src="' . $item['thumbnail'] . '" alt="" class="card-img height-100">
                        
                        <div class="card-body">
                            <a href="" class="card-title">' . $item['title'] . '</a>
                            <p class="card-text">' . $item['context'] . '</p>
                            
                        </div>
                        <div class="card-footer d-flex justify-content-between pt-4">
                            <h5 class="h5">$' . $item['price'] . '</h5>
                            <a href="#" class="btn btn-primary">Buy now</a>
                        </div>
                    </div>
                </div>
                    ';
                }
                ?>


            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['search']))
    ?>





</body>

</html>