<?php
// Initialize the session
session_start();
include('config.php');

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['adharno']) || empty($_SESSION['adharno']) || empty($_SESSION['user_type_id']))
{
  header("location: ../login/login.php");
  exit;
}
$user= ($_SESSION['name']);
$role= ($_SESSION['user_type_id']);
$adhar=$_SESSION['adharno'];
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Farmer</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>
  <body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="./farmer.php">
          <h1 class="tm-site-title mb-0">Farmer Dashboard</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="view_order.php">
                <i class="fas fa-tachometer-alt"></i> Order
                <span class="sr-only">(current)</span>
              </a>
            </li>
			
             <li class="nav-item">
              <a class="nav-link active" href="view_product.php" >
                <i class="far fa-file-alt"></i>
                <span> View Products  </span>
              </a>
             </li>
            <li class="nav-item">
              <a class="nav-link " href="add_product.php">
                <i class="fas fa-shopping-cart"></i> Add Products
              </a>
            </li>
			<li class="nav-item">
                 <a class="nav-link" href="farmer.php">
                    <i class="far fa-user"></i>
                     Home
                 </a>
              </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="../login/logout.php">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
         <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT IMAGE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QUANTITY</th>
					<th scope="col">UNIT</th>
					<th scope="col">PRODUCT DATE</th>
					<th scope="col">EXPIRE DATE</th>
					<th scope="col">UPDATE</th>
					<th scope="col">DELETE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
				<?php
				include('config.php');
				 $sql = "SELECT * FROM vegetable where adharno ='$adhar'";
				 $result = mysqli_query($link, $sql);
				while($row = mysqli_fetch_assoc($result)) 
				{
				?>
                <tbody>
				
                  <tr>
                    
                    <td ><?php echo $row["vname"];?></td>
                    <td> <img src="<?php echo $row["image"];?>" alt="No Image" width="100" height="100"> </td>
                    <td><?php echo $row["price"];?></td>
                    <td><?php echo $row["quantity"];?></td>
					<td><?php echo $row["unit"];?></td>
					<td><?php echo $row["currentdate"];?></td>
					<td><?php echo $row["expiredate"];?></td>
					<td><a href="edit_product.php?id=<?php echo $row["adharno"];?>&&pname=<?php echo $row["vname"];?>&&in=<?php echo $row["id"];?>"> <font color="white">Edit</font></a></td>
                    <td>
                      <a href="delete.php?id=<?php echo $row["adharno"];?>&&pname=<?php echo $row["vname"];?>&&in=<?php echo $row["id"];?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
			<?php } ?>
			
			
              </table>
            </div>
            <!-- table container -->
            <a
              href="add_product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
           </div> 
  
      </div>
	 
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
        </p>
      </div>
    </footer>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() 
		{
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>