<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>TRACK ILLNESS</title>
</head>

<body class="container">
    
    <nav class="navbar nav-pills navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">BOO HEALTH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="home.php">HOME</a>
              </li>    
              <li class="nav-item">
                <a class="nav-link active" aria-disabled="true">ILLNESS TRACK</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Action</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="appointment.php">APPOINTMENTS</a></li>
                  <li><a class="dropdown-item" href="menu.php">SHOPPING</a></li>
                </ul>
              </li>
            
            </ul>
    
            <button class="btn btn-outline-success" type="submit">
                Logout
            </button>
        
          </div>
        </div>
      </nav><br><br><br>
      




    <!-- <div class="container d-flex justify-content-center align-items-center min-vh-100"> -->

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white ">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="google.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Boo Health</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Center of medicine.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello!!</h2>
                     <p>Fill the information below!!</p>
                </div>
                <form method="post" action="ill.php" method="post" onsubmit="return sure()">
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

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">CONFIRM</button>
                    </div> 
                       
                    </div>
                    
                </form>
          </div>
       </div> 

      </div>
    </div>

      


</body>

<script>

  function sure() {
  
    confirm("Sure!!");
    
  
  }
  
  </script>

  </html>