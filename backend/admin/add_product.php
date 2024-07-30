<?php
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $imagePath = "/uploads/" . basename($image);
    $target = "./uploads/" . basename($image);
    $type = $_POST['type'];
    $Mfg  = $_POST['Mfg'];
    $expiry = $_POST['expiry'];
    $company = $_POST['company'];

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO products (name, price, description, image , type,company, Mfg, expiry) VALUES ('$name', '$price', '$description', '$imagePath', '$type' , '$company','$Mfg' , '$expiry')";
        if ($conn->query($sql) === TRUE) {
            echo "New product added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            display: flex;
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
<section id='products'>
     <div class='bg-gray-200 p-5 w-full max-w-sm mx-auto  container mx-auto mt-12'>
         <div class=''>
            
          <h1 class="text-3xl font-bold  text-center">Add New Product</h1>
             <form class='pt-6' method="POST" enctype="multipart/form-data" >
                <div class='grid  '>
                    <label>name:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='text'  name="name" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>
                <div>
                    <label>Price:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <input type="text"  name='price' placeholder='price' class='w-full h-full outline-none bg-transparent'/>
                    
                    </div>
                    </div>
                    
                
                <div>
                    <label>Description:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <input type="textarea"  name='description' placeholder='description' class='w-full h-full outline-none bg-transparent'/>
                    
                    </div>
                    </div>
                    
                

                <div>
                    <label>Image:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <input type="file"  name='image' placeholder='image' class='w-full h-full outline-none bg-transparent'/>
                    
                    </div>
                    </div>

                <div class='grid  '>
                    <label>type:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='text'  name="type" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>

                <div class='grid  '>
                    <label>Company Name:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='text'  name="company" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>

                <div class='grid  '>
                    <label>Manufacturing date:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='date'  name="Mfg" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>

                <div class='grid  '>
                    <label>Expiry date:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='date'  name="expiry" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>
                    
                </div>
              


                <button class='bg-red-600 text-white rounded px-6 py-2 w-56  hover:scale-105 transition-all mx-auto block mt-6' id="adminsubmit">Add Product</button>
             </form>
             </div>
             
         </div>
     </div>
   </section> 
    <!--<h1 class="text-3xl font-bold text-center mt-12">Add New Product</h1>
    <form method="POST" enctype="multipart/form-data">

              <div class='grid  '>
                    <label>name:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='text'  name="name" placeholder="username" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="price" placeholder="Product Price" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Add Product</button>
    </form>-->
</body>
</html>
