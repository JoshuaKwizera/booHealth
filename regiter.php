<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    
    <title>Register</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="boo health logo...png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">To Get Access To Our Medical Services.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Please fill the info</h2>
                     <p>To Continue...</p>
                </div>


                <form method="post" action="reg.php" method="post" onsubmit="return validateForm()">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" id="email" name="email" placeholder="Email address" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control form-control-lg bg-light fs-6" id="date" name="date" placeholder="Date of Birth" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="address" name="address" placeholder="Address" required>
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" placeholder="Password" required>
                    </div><br>

                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="cpass" name="cpass" placeholder="Confirm Password" required>
                    </div><br>
                
                    <div class="input-group mb-3">
                        <input class="btn btn-lg btn-primary w-100 fs-6" type="submit" id="save" name="save" placeholder="Submit">
                    </div> 
                </form>
                    
          </div>
       </div> 

      </div>
    </div>

    

</body>

<script>

    function validateForm() {
    
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let cpass = document.getElementById("cpass").value;

    
    if (name === "" || password === "" || cpass === "") {
            alert("All fields must be filled out");
            return false;
        }

    if(isNaN(name.length)){
        alert("Name must contain only text");
        return false;
    } 
    if(password.length < 6 ) {
        alert("Password is too short");
        return false;
    }
    //console.log(password);
    console.log(cpass);
    if(password !== cpass){
        alert("Password mismatch");
        return false;
    }

    return true;
    }
    
    </script>


</html>