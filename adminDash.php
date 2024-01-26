

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title> Admin Dashboard</title>

    
</head>



<body>




                                         <!-- Modal -->
                                         <div class="modal fade" id="exampleModall8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">THIS TABLE CONTAINS ALL MENU ITEMS</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                  <th scope="col" width="50">PRODUCT ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">CATEGORY</th>
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
                                $sql = "SELECT * FROM menu"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["product_id"] . "</td>";
                                  echo "<td>" . $row["product_name"] . "</td>";
                                  echo "<td>" . $row["price"] . "</td>";
                                  echo "<td>" . $row["category"] . "</td>";
                                  echo "<td class='action-buttons'>";
                                  
                                  
                                  echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
                                  echo "<button class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#editModal{$row["product_id"]}'>Edit</button>";
                                  
                                  

                                  echo "<form method='post' action='deleteMenu.php' onsubmit='return confirmDelete();'>";
                                  echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
                                  echo "<button  class='btn btn-outline-success' type='submit' name='deleteMenu'>Delete</button>";
                                  echo "</form>";
                                  echo "</td>";
                                  echo "</tr>";
                              }
      ?>

                          <!-- Create a modal for each record with the pre-filled form -->
<?php

$conn = mysqli_connect("localhost", "root", "", "b_health");

                                // Check connection

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Fetch data from the database
                                $sql = "SELECT * FROM menu"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();


while ($row = $result->fetch_assoc()) {
    echo "<div class='modal fade' id='editModal{$row["product_id"]}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Menu Item</h1>";
    echo "</div>";
    echo "<div class='modal-body'>";
    
    // Create a form with pre-filled data
    echo "<form method='post' action='updateMenu.php'>";
    echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
    echo "<div class='form-floating mb-3'>";
    
    echo "<input type='text' class='form-control' id='product_name' name='product_name' placeholder='Name' value='" . $row["product_name"] . "'>";
    echo "<label for='product_name'>Product Name</label>";
    echo "</div>";
    echo "<div class='form-floating mb-3''>";
    
    echo "<input type='text' class='form-control' id='price' name='price' placeholder='Name' value='" . $row["price"] . "'>";
    echo "<label for='price'>Price</label>";
    echo "</div>";
    echo "<div class='form-floating mb-3'>";
     
    echo "<input type='text' class='form-control' id='category' name='category' placeholder='Name' value='" . $row["category"] . "'>";
    echo "<label for='category'>Category</label>";
    echo "</div>";
    
    echo "<div class='modal-footer'>";
    
    echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>




    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>BOO HEALTH</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action  bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>ILLNESS TRACKER</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="fas fa-chart-line me-2"></i>APPOINTMENTS</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">THIS TABLE CONTAINS ALL PENDING APPOINTMENTS</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col">APPOINTMENT DATE</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">COMMENT</th>
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
                                $sql = "SELECT * FROM appointment where status='pending'"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["appointment_id"] . "</td>";
                                    echo "<td>" . $row["date_of_appointment"] . "</td>";
                                    echo "<td>" . $row["user_name"] . "</td>";
                                    echo "<td>" . $row["comment_"] . "</td>";
                                    echo "<td class='action-buttons'>";

                                    echo "<form method='post' action='deleteApp.php' class='btn'  onsubmit='return confirmDelete();'>";
                                    echo "<input type='hidden' name='id' value='" . $row["appointment_id"] . "'>";
                                    echo "<button  class='btn btn-outline-success' type='submit' name='deleteApp'>DELETE</button>";
                                    echo "</form>";
                                    
                                    

                                    echo "<form method='post' action='approve.php' class='btn'  onsubmit='return confirmApprove();'>";
                                    echo "<input type='hidden' name='id' value='" . $row["appointment_id"] . "'>";
                                    echo "<button  class='btn btn-outline-success' type='submit' name='approve'>APPROVE</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
        ?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>


                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal7"><i
                        class="fas fa-paperclip me-2"></i>Orders</a>

                        
<!-- Modal -->
<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">THIS TABLE CONTAINS ALL PENDING ORDERS</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">ORDER ID</th>
                                    <th scope="col">USER ID</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">PRICE</th>
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
                                $sql = "SELECT * FROM order_ where status='pending'"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["order_id"] . "</td>";
                                    echo "<td>" . $row["user_id"] . "</td>";
                                    echo "<td>" . $row["description"] . "</td>";
                                    echo "<td>" . $row["price"] . "</td>";
                                    echo "<td class='action-buttons'>";

                                    echo "<form method='post' action='deleteOrder.php' class='btn'  onsubmit='return confirmDelete();'>";
                                    echo "<input type='hidden' name='id' value='" . $row["order_id"] . "'>";
                                    echo "<button  class='btn btn-outline-success' type='submit' name='deleteOrder'>DELETE</button>";
                                    echo "</form>";
                                    
                                    

                                    echo "<form method='post' action='approveOrder.php' class='btn'  onsubmit='return confirmApprove();'>";
                                    echo "<input type='hidden' name='id' value='" . $row["order_id"] . "'>";
                                    echo "<button  class='btn btn-outline-success' type='submit' name='approveOrder'>APPROVE</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
        ?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>


                

                <a href="#" class="list-group-item list-group-item-action bg-transparent dropdown-toggle second-text fw-bold" data-bs-toggle="dropdown"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                        <ul class="dropdown-menu">
                        <li><a class="list-group-item list-group-item-action bg-transparent  second-text fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#exampleModall8">ADD ITEM TO MENU</a></li>
                        <li><a class="list-group-item list-group-item-action bg-transparent  second-text fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#exampleModall8">VIEW MENU ITEMS</a></li>

                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModall8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">THIS TABLE CONTAINS ALL MENU ITEMS</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                  <th scope="col" width="50">PRODUCT ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">CATEGORY</th>
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
                                $sql = "SELECT * FROM menu"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["product_id"] . "</td>";
                                  echo "<td>" . $row["product_name"] . "</td>";
                                  echo "<td>" . $row["price"] . "</td>";
                                  echo "<td>" . $row["category"] . "</td>";
                                  echo "<td class='action-buttons'>";
                                  
                                  
                                  echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
                                  echo "<button class='btn btn-outline-success' data-toggle='modal' data-target='#editModal{$row["product_id"]}'>Edit</button>";
                                  
                                  

                                  echo "<form method='post' action='deleteMenu.php' onsubmit='return confirmDelete();'>";
                                  echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
                                  echo "<button  class='btn btn-outline-success' type='submit' name='delete'>Delete</button>";
                                  echo "</form>";
                                  echo "</td>";
                                  echo "</tr>";
                              }
      ?>

                          <!-- Create a modal for each record with the pre-filled form -->
<?php

$conn = mysqli_connect("localhost", "root", "", "b_health");

                                // Check connection

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Fetch data from the database
                                $sql = "SELECT * FROM menu"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();


while ($row = $result->fetch_assoc()) {
    echo "<div class='modal fade' id='editModal{$row["product_id"]}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog modal-dialog-centered'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Menu Item</h1>";
    echo "</div>";
    echo "<div class='modal-body'>";
    
    // Create a form with pre-filled data
    echo "<form method='post' action='updateMenu.php'>";
    echo "<input type='hidden' name='id' value='" . $row["product_id"] . "'>";
    echo "<div class='form-group'>";
    echo "<label for='product_name'>Product Name</label>";
    echo "<input type='text' class='form-control' id='product_name' name='product_name' value='" . $row["product_name"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='price'>Price</label>";
    echo "<input type='text' class='form-control' id='price' name='price' value='" . $row["price"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='category'>Category</label>";
    echo "<input type='text' class='form-control' id='category' name='category' value='" . $row["category"] . "'>";
    echo "</div>";
    
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
    echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>

                        </ul>


                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModall"><i
                        class="fas fa-gift me-2"></i>USER Mng</a>
                <!-- Modal -->
<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">THIS TABLE CONTAINS ALL SYSTEM USERS</h1>
                          </div>
                          <div class="modal-body">
                          
                          <table class="table bg-white rounded shadow-sm  table-hover table-sm">
                            <thead>
                                <tr>
                                  <th scope="col" width="50">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
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
                                $sql = "SELECT * FROM user_reg"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["user_id"] . "</td>";
                                  echo "<td>" . $row["user_name"] . "</td>";
                                  echo "<td>" . $row["email"] . "</td>";
                                  echo "<td>" . $row["address"] . "</td>";
                                  echo "<td class='action-buttons'>";
                                  
                                  

                                  echo "<form method='post' action='delete.php' onsubmit='return confirmDelete();'>";
                                  echo "<input type='hidden' name='id' value='" . $row["user_id"] . "'>";
                                  echo "<button  class='btn btn-outline-success' type='submit' name='delete'>Delete</button>";
                                  echo "</form>";
                                  echo "</td>";
                                  echo "</tr>";
                              }
      ?>
                            </tbody>
                        </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>


                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>ADMIN
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModall8">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                                <p class="fs-5">MENU</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal7">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                               
                                <p class="fs-5">ORDERS</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                                <p class="fs-5">ILLNESS</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>


                    <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            
                                <p class="fs-5">APPOINTMENTS</p>
                                
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                            
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">OUR USERS</h3>
                    <div class="col">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">DATE OF BIRTH</th>
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
                                $sql = "SELECT * FROM user_reg"; 
                                $result = mysqli_query($conn, $sql);

                                // Close the database connection
                                $conn->close();

                                // Loop through the database results and display data in the table
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["user_id"] . "</td>";
                                    echo "<td>" . $row["user_name"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["address"] . "</td>";
                                    echo "<td>" . $row["date_of_birth"] . "</td>";
                                    echo "<td class='action-buttons'>";
                                    
                                    

                                    echo "<form method='post' action='delete.php' onsubmit='return confirmDelete();'>";
                                    echo "<input type='hidden' name='id' value='" . $row["user_id"] . "'>";
                                    echo "<button  class='btn btn-outline-success' type='submit' name='delete'>Delete</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        function confirmDelete(id) {
            
            if (confirm("Are you sure you want to delete this record?")) {
                //deleteRecord(id);
            }
        }

        function confirmApprove(id) {
            
            if (confirm("Are you sure you want to approve this record?")) {
                //deleteRecord(id);
            }
        }
    </script>
</body>

</html>