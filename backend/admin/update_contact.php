<?php
include('../connection.php');

$result = $conn->query("SELECT * FROM contact LIMIT 1");
$contact = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($contact) {
        $sql = "UPDATE contact SET name='$name', phone='$phone', address='$address' WHERE id=" . $contact['id'];
    } else {
        $sql = "INSERT INTO contact (name, phone, address) VALUES ('$name', '$phone', '$address')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Contact info updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact Info</title>
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
     <div class='bg-gray-200 p-5 w-full max-w-sm mx-auto  container mx-auto mt-28 '>
         <div class=''>
            
          <h1 class="text-3xl font-bold mt-6 text-center">Update Contact info.</h1>
             <form class='pt-6' method="POST" enctype="multipart/form-data" >
                <div class='grid  '>
                    <label>name:</label>
                    <div class='bg-slate-100 p-2' >
                       <input type='text'  name="name" value="<?php echo $contact['name']; ?>" placeholder="name" required class='w-full h-full outline-none bg-transparent'/>
                    </div>
                </div>
                <div>
                    <label>Price:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <input type="text"  name='phone'  value="<?php echo $contact['phone']; ?>" placeholder='phone number' class='w-full h-full outline-none bg-transparent'/>
                    
                    </div>
                    </div>
                    
                
                <div>
                    <label>Address:</label>
                    <div class='bg-slate-100 p-2 flex'>
                    <textarea  name='address' placeholder='address' class='w-full h-full outline-none bg-transparent'><?php echo $contact['address']; ?></textarea>
                    
                    </div>
                    </div>
                    
                

                
                    
                </div>
               


                <button class='bg-red-600 text-white rounded px-6 py-2 w-24 max-w-[100px] hover:scale-105 transition-all mx-auto block mt-6' id="adminsubmit">Update</button>
             </form>
             </div>
             
         
     
   </section>
    </div> 
</body>
</html>
