<?php include 'backend/connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Products</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        button{
            background-color: black;
            color: white;
            padding: 8px;
        }
        .banner .img{
            width: 100%;
            height: 500px;
        }
        .gallery .img{
            width: 200px;
            height: 300px;
        }
        .products .productsmedical{
         
            width: 250px;
            
            display: inline-grid;
        }
        .products .img{
            width: 200px;
            height: 300px;
            left : 2px;
            
        }
    </style>
</head>
<body>
       <header class='h-16  shadow bg-white items-center justify-center'>
       <div class=' container mx-auto flex items-center px-2 justify-between '>
           <div class=''>
              <h1 class='text-3xl font-bold md:ml-16 ml-2 mt-4'>Medical Dispencery</h1>
           </div>
               <button class='px-2 bg-blue-600 text-white rounded h-7 hover:bg-blue-700 mr-[100px] mt-2' id="admin">Admin</button>
             </div>
           </div>
           </div>
           </header>

   

    <!-- Banner Section -->
    <div class="banner">
        <?php
$result = $conn->query("SELECT * FROM banners ORDER BY id DESC LIMIT 1");

while ($row = $result->fetch_assoc()) {

    $imagePath = "./backend/admin" . $row['image'];

    ?>
         <img class="img" src="./<?php echo $imagePath; ?>" />
            <?php
}
?>
    </div>
    <hr/>
    <!-- Our Products Section -->
    



    <div class="products">
        <h2 class="text-5xl font-bold text-center underline mt-12">Our Products</h2>
        <div class="grid grid-cols-3 gap-10 mt-12 ml-12 ">
            
             
        <?php
       
    $result = $conn->query("SELECT * FROM products");
     while ($row = $result->fetch_assoc()) {
    $imagePath = "./backend/admin" . $row['image'];
    ?>
     <div class="">
    <a href="productdetail.php?id=<?php echo $row['id']; ?> "><img class="h-[300px] w-[300px] object-cover object-end" src="./<?php echo $imagePath; ?>" /></a>
    <?php
    
    ?>
     <a href="#"
    class="font-medium text-2xl inline-block hover:text-red-600 transition duration-500  ml-[100px] "> <?php echo '<h3 class="font-bold">' . $row['name'] . '</h3>'; ?>  </a>
    <p class="text-gray-500 text-sm italic ml-[60px]">
               Description- <?php echo  $row['description']; ?>
            </p>
    <?php
    echo '<p class="ml-2 text-gray-600 text-lg ml-[110px]">Rs.' . $row['price'] . '</p>';
    echo '</div>';
    
}

?>
    
     </div>
</div>
    </div>
    <hr/>

    <!-- Gallery Section -->
   

        
    <div class="gallery">

        <h2 class="text-5xl font-bold text-center underline mt-12">Gallery</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-12 ">           
        <?php
       $result = $conn->query("SELECT * FROM gallery");
       while ($row = $result->fetch_assoc()) {
       $imagePath = "./backend/admin" . $row['image'];

    ?>
    <div class="flex">
    <img class="w-full h-[400px]" src="./<?php echo $imagePath; ?>" />
    </div>
    
    <?php
}
?>
</div>
</div>
    
    
   <hr/>
    <!-- Contact Section -->
    <div class="bg-gray-200 p-5 w-full max-w-sm mx-auto  container mx-auto mt-12 mb-12">
        <h2 class="text-3xl font-bold  text-center underline">Contact Us</h2>
        <?php
    $result = $conn->query("SELECT * FROM contact");
$row = $result->fetch_assoc();
?>
        <p class="text-xl font-semibold ml-20 mt-6 p-1">Name: <span class="text-xl font-normal"><?php echo $row['name']; ?></span></p>
        <p class="text-xl font-semibold text-center p-1">Phone: <span class="text-xl font-normal"><?php echo $row['phone']; ?></span></p>
        
        <p class="text-xl font-semibold text-center p-1">Address:<span class="text-xl font-normal"> <?php echo $row['address']; ?></span></p>
    </div>

    <script>
	document.getElementById("admin").addEventListener("click", function() {
    window.location.href = "adminlogin.html";
   });
</script>

 
</body>
</html>
