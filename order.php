<?php
// On other pages
session_start(); // Make sure to start the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Now, $user_id contains the user's ID, and you can use it as needed.
} else {
    // User is not logged in or the session expired, handle accordingly (e.g., redirect to login).
}

/// Database connection parameters
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

// Function to calculate the total price of items in the cart
function calculateTotalPrice($user_id) {
    global $conn;

    // Replace 'user_id' with the actual column name for user ID
    $select_query = "SELECT SUM(total) AS total_price FROM cart WHERE user_id = $user_id";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_price'];
    } else {
        return 0;
    }
}

// Function to place an order
function placeOrder($user_id) {
    global $conn;

    // Calculate the total price
    $total_price = calculateTotalPrice($user_id);
    $status = "pending";

    if ($total_price > 0) {
        // Create a description of items in the order
        $description = "";
        $select_query = "SELECT prod_id, prod_name, quantity, price, total FROM cart WHERE user_id = $user_id";
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pid = $row['prod_id'];
                $prod_name = $row['prod_name'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $total = $row['total'];
                $description .= "Product ID: $pid, Product Name: $prod_name, Quantity: $quantity, Price: $price, Total: $total\n";
            }
        }

        // Insert the order into the 'order_' table
        $insert_query = "INSERT INTO order_ (user_id, description, price, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("isss", $user_id, $description, $total_price, $status);
        $stmt->execute();

        // Delete items from the cart table
        $delete_query = "DELETE FROM cart WHERE user_id = $user_id";
        $conn->query($delete_query);

        echo "<script>alert('Order placed successfully!'); window.location.href='menu.php';</script>";
    } else {
        echo "<script>alert('No items in the cart.'); window.location.href='menu.php';</script>";
    }
}

// Example usage:

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["order"])){
    placeOrder($user_id);
    
}

// Close the database connection
$conn->close();
?>
