<?php

include('includes/config.php');

// Fetch all active testimonials
$sql = "SELECT tblusers.FullName, tbltestimonial.UserEmail, tbltestimonial.Testimonial, tbltestimonial.PostingDate, tbltestimonial.status FROM tbltestimonial JOIN tblusers ON tblusers.Emailid=tbltestimonial.UserEmail WHERE tbltestimonial.status=1";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>OCHMIS | User Testimonials</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">User Testimonials</h2>

                        <div class="panel panel-default">
                            <div class="panel-heading">Testimonials</div>
                            <div class="panel-body">
                                <!-- Bootstrap Carousel -->
                                <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                    <?php 
                                    $cnt = 0;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { 
                                    ?>
                                        <div class="item <?php if ($cnt == 0) echo 'active'; ?>">
                                            <div class="testimonial">
                                                <p><?php echo htmlentities($result->Testimonial); ?></p>
                                                <p><strong><?php echo htmlentities($result->FullName); ?></strong></p>
                                                <p><em><?php echo htmlentities($result->PostingDate); ?></em></p>
                                            </div>
                                        </div>
                                    <?php 
                                            $cnt++;
                                        } 
                                    } 
                                    ?>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#testimonialCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#testimonialCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<style>
    .testimonial {
        padding: 30px;
        text-align: center;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 10px;
    }
    .testimonial p {
        margin: 10px 0;
    }
    .testimonial strong {
        display: block;
        font-size: 1.2em;
        margin-top: 10px;
    }
    .testimonial em {
        color: #777;
    }
</style>
