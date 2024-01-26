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


<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_health";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





// Get user input from the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prod_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $total = intval($quantity) * intval($price);


//Calculate the overall total of all items in the cart
$overallTotalQuery = "SELECT SUM(total) AS overall_total FROM cart";
$Tresult = $conn->query($overallTotalQuery);

if ($Tresult->num_rows > 0) {
    $row = $Tresult->fetch_assoc();
    $overallTotal = $row['overall_total'];
} else {
    $overallTotal = 0;
}

    // Check if the item already exists in the cart
    $checkQuery = "SELECT * FROM cart WHERE prod_name = ?";
    $stmt = $conn->prepare($checkQuery);

    if ($stmt) {
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            // Item already exists in the cart, update quantity and total
            $updateQuery = "UPDATE cart SET quantity = quantity + ?, total = total + ? WHERE prod_name = ?";
            $stmt = $conn->prepare($updateQuery);

            if ($stmt) {
                $stmt->bind_param("iss", $quantity, $total, $name);
                if ($stmt->execute()) {
                    // Update successful
                    $stmt->close();
                    $conn->close();
                    echo "<script>alert('Item updated in the cart.'); window.location.href='menu.php';</script>";
                    exit();
                } else {
                    // Update failed
                    $stmt->close();
                    $conn->close();
                    echo "<script>alert('Error while updating item in the cart, please try again'); window.location.href='menu.php';</script>";
                    exit();
                }
            }
        } else {
            // Item doesn't exist in the cart, insert a new record
            $insertQuery = "INSERT INTO cart(prod_name, quantity, price, total, user_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);

            if ($stmt) {
                $stmt->bind_param("sssss", $name, $quantity, $price, $total, $user_id);
                if ($stmt->execute()) {
                    // Insert successful
                    $stmt->close();
                    $conn->close();
                    echo "<script>alert('Added Successfully!! '); window.location.href='menu.php';</script>";
                    exit();
                } else {
                    // Insert failed
                    $stmt->close();
                    $conn->close();
                    echo "<script>alert('Error while adding item, please try again'); window.location.href='menu.php';</script>";
                    exit();
                }
            } else {
                // SQL statement preparation failed
                $conn->close();
                echo "<script>alert('SQL statement preparation failed.'); window.location.href='menu.php';</script>";
                exit();
            }
        }
    }
}


// Close the database connection
$conn->close();


?>
