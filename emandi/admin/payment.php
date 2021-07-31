
<?php
// Initialize the session
session_start();

include '../login/config.php';



$user= ($_SESSION['username']);
if($user!='admin'){
  header("location: ../login/login.php");
  exit;
}

$result = mysqli_query($link,"SELECT count(*) as count FROM users ");
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numusers= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM vegetable ");
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numvegetables= $row['count'];
    }
} 

$result = mysqli_query($link,"select count(*) as count from (SELECT count(s.dealerid) FROM stock as s inner join users as u on s.dealerid=u.username where u.role='retailer' group by s.dealerid) t") ;

if (mysqli_num_rows($result) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numretailers= $row['count'];
    }
} 

$result = mysqli_query($link,"select count(*) as count from (SELECT count(s.dealerid) FROM stock as s inner join users as u on s.dealerid=u.username where u.role='wholeseller' group by s.dealerid) t") ;

if (mysqli_num_rows($result) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numwholesellers= $row['count'];
    }
} 

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
    <title>GB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="sumit kumar">
      <title>Green Basket</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
      >
    


    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="./admin.css">
    

    <link rel="stylesheet" href="../css/footer.css">
    

  
  </head>

  <body>
<div class="panel panel-default">
  <div class="panel-heading"style="background-color:  #095f59;">
    <h3 class="panel-title">  All Users </h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
         <tr>
           <th>username</th>
            <th>Vegetable</th>
             <th>dealerid</th>
              <th>region</th>
               <th>quantity</th>
                <th>paymentstatus</th>
             <th>paymentat</th>
             <th>price</th>

      </tr>
      <?php
        $result = mysqli_query($link,"select c.*,s.price from cart c join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region  ; ");
        if (mysqli_num_rows($result)) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result) ) {
                echo '
                 <tr>

                  <td>'.$row['username'].'</td>
                  <td>'.$row['vegname'].'</td>
                  <td>'.$row['dealerid'].'</td>
                  <td>'.$row['region'].'</td>
                  <td>'.$row['quantity'].'</td>
                  <td>'.$row['paymentstatus'].'</td>
                   <td>'.$row['paymentat'].'</td>
                    <td>'.$row['price'].'</td>

                </tr>
                ';         
                   }
        }
      ?>

   
    </table>

  </div>
</div>
</body>
</html>