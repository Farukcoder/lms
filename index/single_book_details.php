<?php
    require_once '../dbcon.php';
    $id = $_GET['id'];
?>

<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library managment</title>

    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">

    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>
<body>
	<div class="card card-solid">
	        <div class="card-body">
	          <div class="row">
                  <?php
                  $result = mysqli_query($con, "SELECT * FROM books Where id = $id ");

                  $row = mysqli_fetch_assoc($result);

                  ?>
	            <div class="col-12 col-sm-6">
                    <div class="col-12 col-sm-6">
                        <img style="margin-left: 100px; margin-top:20px;  width: 400px; height: 500px"  src="../images/books/<?=$row['book_image'];?>" alt="">
                    </div>

                </div>
	            <div class="col-12 col-sm-6">
	              <h3 class="my-3"><?=$row['book_name']?></h3>
	              <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

	              <hr>
	              <h4>Book Author Name</h4>
	              <h5 class="my-3"><?= $row['book_author_name']?></h5>
                    <br>
                    <br>
                    <h4 class="my-3">Book Publication Name</h4>
	                <h5 class="my-3"><?= $row['book_publication_name']?></h5>
                    <br>
                    <br>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Book Order</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-primary">
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form>
                                            <div class="card-body">
                                                <?php
                                                $result= mysqli_query($con,"SELECT `books`.`book_name`,`students`.`fname`,`students`.`lname`,`students`.`email`,`students`.`phone` FROM `students` INNER JOIN `books` ");

                                                $row = mysqli_fetch_assoc($result);

                                                ?>
                                                <div class="form-group">
                                                    <label for="exampleInputbookname">Book Name</label>
                                                    <input type="text" class="form-control" id="exampleInputbookname" placeholder="Book Name" readonly="" value="<?=$row['book_name']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputname">Name</label>
                                                    <input type="text" class="form-control" id="exampleInputname" placeholder="Name" readonly="" value="<?= $row['fname'].' '.$row['lname']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" readonly="" value="<?= $row['email']?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputphone">Phone</label>
                                                    <input type="text" class="form-control" id="exampleInputphone" placeholder="Phone" readonly="" value="<?= $row['phone']?>">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="delivery">
                                                        <label class="form-check-label">Self Delivery</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="delivery" checked="">
                                                        <label class="form-check-label">Shop Delivery</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shop Delivery Address</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Order Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg btn-flat" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Book Order
                    </button>
	            </div>
	          </div>
	        <!-- /.card-body -->
	      </div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<script src="../assets/vendor/toastr/toastr.min.js"></script>
<!--morris chart-->
<script src="../assets/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="../assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--dataTable-->
<script src="../assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
<script src="../assets/javascripts/examples/tables/data-tables.js"></script>
<!--Examples-->
<script src="../assets/javascripts/examples/dashboard.js"></script>
</body>


</html>