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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>HOME</title>
</head>
<body class="container">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary visually-hidden" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                      TAKE ILLNESS TRACK
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the information below in order to get to know your problem!!</h1>
                          </div>
                          <div class="modal-body">
                          <form  method="post" action="ill.php">
                          <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        <label for="name">Full Name</label>
                    </div>
                  
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                      
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                        <label for="phone">Phone Number</label>
                    </div><br>
                    
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="DOB">
                        <label for="date">Date Of Birth</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="onset" name="doo" placeholder="Date Of Onset">
                        <label for="onset">Date Of Onset</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="symptom" name="symptoms" placeholder="Symptoms"></textarea>
                        <label for="symptoms">Symptoms</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" id="severe" name="severe">
                            <option value="mild">Mild</option>
                            <option value="moderate">Moderate</option>
                            <option value="severe">Severe</option>
                          </select>
                          <label for="symptoms">Severity Of Symptoms</label>
                          
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="message" name="message" placeholder="message">
                        <label for="message">Additional Comments (if any)</label>
                    </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">CONFIRM</button>
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary visually-hidden" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      APPOINTMENTS BOOKING
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the information below in order to get your appointment scheduled!!</h1>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="appoint.php" method="post">
                          <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        <label for="name">Full Name</label>
                    </div>
                  
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                      
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                        <label for="phone">Phone Number</label>
                    </div><br>
                    
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="date" name="date" placeholder="Appointment Date">
                        <label for="date">Appointment Date</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="message" name="message" placeholder="message">
                        <label for="message">Additional Comments (if any)</label>
                    </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">CONFIRM</button>
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div>



    <!----------------------- Nav Bar -------------------------->

     <!-- <div class="container d-flex justify-content-center align-items-center min-vh-100"> -->
        <nav id="navbar-example2" class="navbar fixed-top  bg-body-tertiary px-3 mb-3">

      
            <a class="navbar-brand" href="#">BOO HEALTH</a>

         

            <ul class="nav nav-pills ">


              <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1">ILLNESS TRACK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2">APPOINTMENTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3">SHOP</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ACTION</a>
                <ul class="dropdown-menu">
                <li>  
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      APPOINTMENTS BOOKING
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the information below in order to get your appointment scheduled!!</h1>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="appoint.php">
                          <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                        <label for="name">Full Name</label>
                    </div>
                  
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Email address</label>
                    </div>
                      
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                        <label for="phone">Phone Number</label>
                    </div><br>
                    
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="date" name="date" placeholder="Appointment Date" required>
                        <label for="date">Appointment Date</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="message" name="message" placeholder="message">
                        <label for="message">Additional Comments (if any)</label>
                    </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">CONFIRM</button>
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div></li>



                  
                  <li><!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                      TAKE ILLNESS TRACK
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the information below in order to get to know your problem!!</h1>
                          </div>
                          <div class="modal-body">
                          <form  method="post" action="ill.php">
                          <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        <label for="name">Full Name</label>
                    </div>
                  
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                      
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                        <label for="phone">Phone Number</label>
                    </div><br>
                    
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="DOB">
                        <label for="date">Date Of Birth</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="onset" name="doo" placeholder="Date Of Onset">
                        <label for="onset">Date Of Onset</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="symptom" name="symptoms" placeholder="Symptoms"></textarea>
                        <label for="symptoms">Symptoms</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" id="severe" name="severe">
                            <option value="mild">Mild</option>
                            <option value="moderate">Moderate</option>
                            <option value="severe">Severe</option>
                          </select>
                          <label for="symptoms">Severity Of Symptoms</label>
                          
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="message" name="message" placeholder="message">
                        <label for="message">Additional Comments (if any)</label>
                    </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">CONFIRM</button>
                    </div> 
                    </form>
                          </div>
                        </div>
                      </div>
                    </div></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="menu.php">SHOP </a></li>
                </ul>
              </li>
              
             
              
             
              
            </ul>
            <a href="logout.php" type="button" class="btn btn-primary">
              LOGOUT
          </a>
            
          </nav><br><br>
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <h4>Welcome to the <b>BOO HEALTH</b> medical system where all your health needs are satisfied!!</h4><br>
            <h3>With Us You can: </h3><br><br>
            <h5 id="scrollspyHeading1">Findout About Your Illness </h5>
            <p>This is a convenient and accessible way to take control of your health. Choose a location that suits you and undergo our illness assessment to receive instant feedback from our skilled professionals, along with any necessary prescriptions. Your well-being is our top priority, and in severe cases, we'll arrange a consultation with our expert physicians. Your health matters, and with our service, you can proactively manage it effortlessly. Don't hesitate; start your journey towards better health today.</p>
            <h5 id="scrollspyHeading2">Book An Appointment</h5>
            <p>This is designed to offer you flexibility and convenience in seeking medical care. Schedule an appointment with our exceptionally skilled doctors at a time that suits your busy schedule. In some cases, a face-to-face consultation with the doctor may be necessary to address your specific needs. Your health matters, and we're here to ensure you receive the best care possible. Don't hesitate to reach out and secure your appointment today.</p>
            <h5 id="scrollspyHeading3">Shop your Favorites</h5>
            <p>This is your gateway to a wide selection of medical products. Browse through our extensive range and choose the items you need, from medicines to healthcare supplies. We'll ensure swift delivery right to your doorstep, providing you with the utmost convenience. Your health and well-being are our priorities, and we're here to make it easier for you to access the products you require. Shop now and have your favorites delivered instantly to your location.</p>
            
          </div>
        



          <div class="container">

          <div id="liveAlertPlaceholder"></div>
         
            
            <div class="row">
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.freepik.com/premium-vector/online-pharmacy-store-medicines-online_1419-2172.jpg?w=740" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">SHOP</h5>
                      <p class="card-text">Get all your medical equipments here</p>
                      <a href="orderCheck.php" class="btn btn-primary">CHECK OUT YOUR ORDER STATUS</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.freepik.com/premium-vector/online-pharmacy-store-medicines-online_1419-2172.jpg?w=740" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">APPOINTMENTS</h5>
                      <p class="card-text">Book an appointment with the best doctors</p>
                      <a href="appointCheck.php" class="btn btn-primary">CHECK OUT YOUR APPOINTMENT STATUS</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.freepik.com/premium-vector/online-pharmacy-store-medicines-online_1419-2172.jpg?w=740" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">ILLNESS TRACK</h5>
                      <p class="card-text">Findout about your illness instantly with an immediate feedback</p>
                      <a href="#" class="btn btn-primary">Take Tracker</a>
                      
                    </div>
                  </div>
              </div>
            </div>
          </div><br><br><br><br><br><br>



          

    </div>

    

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>
</html>