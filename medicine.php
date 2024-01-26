<?php
// On other pages
session_start(); // Make sure to start the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Now, $user_id contains the user's ID, and you can use it as needed.
} else {
    // User is not logged in or the session expired, handle accordingly (e.g., redirect to login).
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>MENU</title>
</head>

<body class="container">

<!-- Modal -->
<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">YOUR CART</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                  <th scope="col" width="50">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                $conn = mysqli_connect("localhost", "root", "", "b_health");

                                // Check connection

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Fetch data from the database
                                $sql = "SELECT * FROM cart"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["prod_id"] . "</td>";
                                  echo "<td>" . $row["prod_name"] . "</td>";
                                  echo "<td>" . $row["quantity"] . "</td>";
                                  echo "<td>" . $row["price"] . "</td>";
                                  echo "<td>" . $row["total"] . "</td>";
                                  echo "<td class='action-buttons'>";
                                  
                                  

                                  echo "<form method='post' action='deleteItem.php' onsubmit='return confirmDelete();'>";
                                  echo "<input type='hidden' name='id' value='" . $row["prod_id"] . "'>";
                                  echo "<button  class='btn btn-outline-success' type='submit' name='deleteItem' data-item-id='1'>Remove</button>";
                                  echo "</form>";
                                  echo "</td>";
                                  echo "</tr>";
                              }
      ?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">

                                                       <!-- Include the CalculateTotal.php file to calculate the overall total -->
                                                       <?php include 'CalculateTotal.php'; ?>

<!-- Display the overall total -->
<div id="overall-total">
    Overall Total: UGX<?php echo number_format($overallTotal, 0); ?>
</div><br><br>

<button type="button" class="btn btn-secondary" >Order</button>


                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>

<nav class="navbar nav-pills fixed-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BOO HEALTH</a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="home.php">HOME</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-disabled="true" href="menu.php">MENU</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Categories</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item active" href="medicine.php">Medicine</a></li>
              <li><a class="dropdown-item" href="tool.php">Medical tools</a></li>
            </ul>
          </li>
        
        </ul>

        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#exampleModall">
        <i class="fas fa-shopping-cart me-2"></i></a>
    
      </div>
    </div>
  </nav><br>
  



<div class="container ">

<div class="container text-center" ><br><br>
<h4 >
     THE MENU, Shop all Medicine here!!!
</h4>
</div> <br>

<div class="row">

<?php
  
    $conn = mysqli_connect("localhost", "root", "" , "b_health");

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT * FROM menu where category='medicine'";
    $result = mysqli_query($conn, $sql);

    
        // Loop through the database results and display data in the table
        
        while ($row = $result->fetch_assoc()) {
          
            
            echo '<div class="col-md-4 mb-4">';
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img src='https://img.freepik.com/premium-vector/online-pharmacy-store-medicines-online_1419-2172.jpg?w=740' class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
            echo '<h5 class="card-title">' . $row['price'] . '</h5>';
            
            echo "<form method='post' action='cart.php'>";
            echo "<input type='number' id='quantity' name='quantity' min='1' value='1'><br><br>";
            echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
            echo "<input type='hidden' name='name' value='" . $row["product_name"] . "'>";
            echo "<input type='hidden' name='price' value='" . $row["price"] . "'>";
            echo "<button  class='btn btn-lg btn-primary w-100 fs-6' type='submit' name=''>ADD TO CART</button>";
            echo "</form>";

            echo "</div>";
            
            echo "</div>";
            echo '</div>';
            
          
            
            
        }
        

    // Close the database connection
    $conn->close();
?>

      
</body>

<script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        function confirmDelete(id) {
            
            if (confirm("Are you sure you want to delete this item?")) {
                //deleteRecord(id);
            }
        }

        

    </script>


</html>