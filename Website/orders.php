<?php
include "db_conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <link rel="stylesheet" href="orders.css">
  <style>
    /* orders.css */
    

.navbar {
    display: flex;
    align-items: center;
    padding: 20px;

}

.navbar img {
    transition: transform 0.3s;
    margin-right: 15px;
    filter: brightness(100%);
    filter: grayscale(100%);
}

.navbar img:hover {
    transform: scale(1.1);
    filter: grayscale(100%);
}

.navbar a ion-icon {
    font-size: 24px;
    margin-right: 15px;
    transition: 0.2s;
}

.navbar ion-icon:hover {
    transform: scale(1.1);
}

nav {
    flex: 1;
    text-align: right;
}

nav ul {
    display: inline-block;
    list-style-type: none;
}

nav ul li {
    align-content: center;
    display: inline-block;
    margin-right: 20px;
}

a {
    text-decoration: none;
    color: #555;
}

nav ul li a {
    text-decoration: none;
    color: #555;
}




nav ul li a:hover {
    text-decoration: none;
    color: #001;
}

.container {
    max-width: 1300px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      /* margin-left: 100px;   */
      /* margin-right: 100px; */
      background-color: #fff;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      /* margin: 100px 0 100px 0; */
    }

    table th,
    table td {
      padding: 10px 10px;
      text-align: left;
    }

    table th {
      background-color: #f2f2f2;
      border-bottom: 2px solid #e6e6e6;
    }

    table tr {
      border-bottom: 1px solid #f2f2f2;
    }

    table tr:last-child {
      border-bottom: none;
    }

    table tr:hover {
      background-color: #f9f9f9;
    }

    /* Responsive styles for small screens */
    @media screen and (max-width: 600px) {
      table {
        font-size: 14px;
      }

      table th,
      table td {
        padding: 8px 10px;
      }
    }
  </style>
</head>

<body>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" width="125px" alt=""></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="dashBoardBackEnd.html">Home</a></li>
                        <li><a href="AddProduct.php">Add Products</a></li>
                        <li><a href="SearchProducts.php">Search Products</a></li>
                    </ul>
                </nav>
                <a href="cart.html">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
                <a href="login.html">
                    <ion-icon name="person-outline"></ion-icon>
                </a>

            </div>
            <hr>
        </div>
    </div>
  <h1>Orders</h1>
  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>product ID</th>
        <th>Email</th>
        <th>adress</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <!-- Orders will be dynamically inserted here -->

      <?php
      // Assuming you have established a database connection $conn
      include "db_conn.php";

      // Query to fetch data from the "orders" table along with the product details
      $sql = "SELECT o.orderID, o.proID, o.address, o.quantity, p.price, o.date, o.email
        FROM orders o
        INNER JOIN products p ON o.proID = p.ID";

      // Execute the query
      $result = mysqli_query($conn, $sql);

      // Check if any rows were returned
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $orderID = $row['orderID'];
          $productID = $row['proID'];
          $email = $row['email'];
          $address = $row['address'];
          $quantity = $row['quantity'];
          $price = $row['price'];
          $date = $row['date'];
          ?>
          <!-- Insert the data into the table dynamically -->
          <tr>
            <td>
              <?php echo $orderID; ?>
            </td>
            <td>
              <?php echo $productID; ?>
            </td>
            <td>
              <?php echo $email; ?>
            </td>
            <td>
              <?php echo $address; ?>
            </td>
            <td>
              <?php echo $quantity; ?>
            </td>
            <td>
              <?php echo $price; ?>
            </td>
            <td>
              <?php echo $date; ?>
            </td>
          </tr>
          <?php
        }
      } else {
        // Handle the case where no orders are available
        ?>
      <tr>
        <td colspan="6" style="text-align: center;">No orders found.</td>
      </tr>
      <?php
      }

      // Free the result set
      mysqli_free_result($result);
      ?>

    </tbody>
  </table>
</body>

</html>