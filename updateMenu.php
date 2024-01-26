<?php
if ($_SERVER["REQUEST_METHOD"]  === "POST") {
    
    $id = $_POST["id"];
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    
    
    

   
    $conn = mysqli_connect("localhost", "root", "", "b_health");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update user data in the database
    $sql = "UPDATE menu SET product_name=?, price=?, category=? WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $product_name, $price, $category, $id);

    if ($stmt->execute()) {
        // Data updated successfully
        $stmt->close();
        $conn->close();

        echo "<script>alert('Updated Successfully.'); window.location.href='adminDash.php';</script>";
        exit;
        
    } else {
        // Error updating data
        echo "Error updating data: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}


?>