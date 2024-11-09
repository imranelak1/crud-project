<?php
include 'db.php';
include 'navbar.php';
// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <?php renderNavbar("User Management Dashboard"); ?>

    <div class="container mx-auto py-10 px-4 sm:px-8">
      
        <div class="flex justify-end mb-6">
            <a href="create.php" class="bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                + Add New User
            </a>
        </div>

        
        <div class="overflow-hidden rounded-lg shadow-md">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-200 to-gray-300">
                    <tr class="text-gray-700 uppercase text-xs tracking-wider font-semibold">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">password</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 divide-y divide-gray-200 text-sm font-medium">
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-200 ease-in-out">
                        <td class="py-4 px-6 text-left whitespace-nowrap"><?php echo $row['id']; ?></td>
                        <td class="py-4 px-6 text-left whitespace-nowrap"><?php echo $row['fullname']; ?></td>
                        <td class="py-4 px-6 text-left whitespace-nowrap"><?php echo $row['email']; ?></td>
                        <td class="py-4 px-6 text-left whitespace-nowrap"><?php echo $row['password']; ?></td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full hover:bg-yellow-500 hover:text-white transition-colors duration-300 ease-in-out shadow-sm mr-2">
                                Edit
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-red-100 px-3 py-1 rounded-full hover:bg-red-600 transition-colors duration-300 ease-in-out shadow-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
