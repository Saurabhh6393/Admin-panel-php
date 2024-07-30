<?php include('../connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            display: flex;
        }
        button{
            background-color: blue;
            color: white;
            margin: 8px;
            height: 32px;
        }
        .upper{
            display: inline-flex;
        }
        .upper .button{
           margin-top: 20px;
          height: 24px;
            margin-left: 500px;
        }
         .img{
            width: 200px;
            height: 300px;
            left : 2px;
            
        }
        .sidebar{
            position: sticky;
            top: 0;
            left :0;
            bottom : 0;
            width : 300px;
            height: 100vh;
            padding : 0 1.7rem;
            color:#fff;
            overflow : hidden;
            transition: all 0.5s linear;
            background : gray;
        }
        .main-content{
            position: relative;
            width: 100%;
            padding :1rem;
        }
        

    </style>
</head>
<body>

    <div class="sidebar">
    <h1 class="text-2xl  text-dark font-semibold p-8 underline">Admin panel</h1>
    <div class=" p-2">

    <input type="button" class="text-md bg-red-600 text-white w-28 mt-4 rounded-md h-8 mr-2 " onclick="location.href='add_banner.php';" value="Add Banner" />
    <input type="button" class="text-md bg-red-600 text-white w-32 mt-6 rounded-md h-8 mr-2 " onclick="location.href='add_product.php';" value="Add Products" />
    <input type="button" class="text-md bg-red-600 text-white w-44 mt-6 rounded-md h-8 mr-2" onclick="location.href='add_gallery.php';" value="Add Gallery Image" />
    <input type="button" class="text-md bg-red-600 text-white w-44 mt-6 rounded-md h-8 mr-2" onclick="location.href='update_contact.php';" value="Update Contact Info" />
    </div>
    </div>
    

    <div class ="main-content">

     
    <h1 class="text-3xl font-bold text-center underline mb-4 ">Admin Dashboard</h1>
    <hr/>
    <h1 class="text-3xl font-bold mt-4 ml-24 underline">Products-</h1>
    <div class="grid grid-cols-3 gap-10 mt-12 ml-12">
    <?php

    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        $imagePath = "/" . $row['image'];
        ?>
        
        <div class="">
        <img class="h-[300px] w-[300px] object-cover object-end" src="./<?php echo $imagePath; ?>" />
        <?php
        echo '<h3 class="font-medium text-2xl inline-block hover:text-red-600 transition duration-500  ml-[100px]">' . $row['name'] . '</h3>';
        ?><p class="text-gray-500 text-sm italic ml-[60px]">
        Description- <?php echo  $row['description']; ?>
       </p>
       <?php
        
        echo '<p class="ml-2 text-gray-600 text-lg ml-[110px]">Rs.' . $row['price'] . '</p>';
    
        echo '<a class="bg-blue-600 text-white w-20 h-8 ml-8 rounded-md mr-8  inline-block text-center py-2" href="edit_product.php?id=' . $row['id'] . '">Edit</a>';
        echo '<a class="bg-blue-600 text-white w-20  h-8 text-center ml-8 rounded-md mr-4 mt-2 inline-block text-center py-2" href="delete_product.php?id=' . $row['id'] . '">Delete</a>';
        echo '</div>';

    
    }
        ?>
        </div>
    </div>
    </div>   
    
</body>
</html>
