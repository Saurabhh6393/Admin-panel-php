<?php
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image']['name'];
    $imagePath = "/uploads/" . basename($image);
    $target = "./uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO banners (image) VALUES ('$imagePath')";
        if ($conn->query($sql) === TRUE) {
            echo "New banner added successfully";
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
    <title>Add Banner</title>
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
<section id='banner'>
     <div class='bg-gray-200 p-5 w-full max-w-sm mx-auto  container mx-auto mt-28 '>
         <div class=''>
            
          <h1 class="text-3xl font-bold mt-6 text-center">Add new banner</h1>
             <form class='pt-6' method="POST" enctype="multipart/form-data" >
                <div class='grid  '>

                <div>
                    <label>Image:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <input type="file"  name='image' placeholder='image' class='w-full h-full outline-none bg-transparent'/>
                    
                    </div>
                    </div>
                    
                </div>
                
                    
                </div>

                <button class='bg-red-600 text-white rounded px-6 py-2 w-full max-w-[100px] hover:scale-105 transition-all mx-auto block mt-6' id="adminsubmit">Add </button>
             </form>

             
         </div>
     </div>
   </section>
    </div> 
</body>
</html>
