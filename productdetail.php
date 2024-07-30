<?php include 'backend/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Products</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
    </style>
</head>
<body>

<header class='h-16 shadow bg-white items-center justify-center'>
    <div class='container mx-auto flex items-center px-2 justify-between'>
        <div>
            <h1 class='text-3xl font-bold md:ml-16 ml-2 mt-4'>Medical Dispensary</h1>
        </div>
        <button class='px-2 bg-blue-600 text-white rounded h-7 hover:bg-blue-700 mr-[100px] mt-2' id="admin">Admin</button>
    </div>
</header>

<div class="products">
    <?php
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        
        $result = $conn->query("SELECT * FROM products WHERE id=$id");

        if ($result === false) {
            die("Query failed: " . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
            $imagePath = "backend/admin/" . $row['image'];
            ?>
            <div class="grid grid-cols-2 gap-2 ml-40 mt-6">
                <div class="">
                <img class="h-[500px] w-[500px] object-cover object-end" src="<?php echo htmlspecialchars($imagePath); ?>" alt="Product Image" />
                </div>
            <div class="">    
                <a href="" class="font-bold text-4xl inline-block hover:text-red-600 transition duration-500  ml-[-20px] mt-6">
                   <?php echo htmlspecialchars($row['name']);?>
                </a><
                <p class="text-gray-500 text-xl italic ml-[-80px] mt-2">
                    Description- <?php echo htmlspecialchars($row['description']); ?>
                </p>
                <p class=" text-gray-600 text-xl   font-semibold underline mt-3">
                    Rs. <?php echo htmlspecialchars($row['price']); ?>
                </p>
                <p class=" text-gray-600 text-xl     ml-[-60px] mt-2">
                    Type of medicine- <?php echo htmlspecialchars($row['type']); ?>
                </p>
                <p class=" text-gray-700 text-xl ml-[-50px] mt-2 ">
                   <span > Company name- <?php echo htmlspecialchars($row['Company']); ?></span>
                </p>
                <p class="ml-2 text-gray-600 text-xl ml-[-50px] mt-4 font-semibold mt-4">
                 Manufacturing Date- <span class="text-red-700"><?php echo htmlspecialchars($row['Mfg']); ?></span>
                </p>
                <p class="ml-2 text-gray-600 text-xl ml-[-30px] font-semibold mt-4">
                 Expiry Date- <span class="text-red-700"><?php echo htmlspecialchars($row['expiry']); ?></span>
                </p>
                <p class="mt-4 ml-[-80px]">Precaution - Always follow the prescribed dosage, avoid </br> mixing with alcohol, keep out of reach of children, and store </br> a cool, dry place. </p>
                <p class="mt-8 underline">children keep away</p> 
                   
            </div> 
            </div>
            <?php
        }
    } else {
        echo "ID parameter is missing";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
