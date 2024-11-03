<?php
include 'db.php';
include 'navbar.php';
$id = $_GET['id'];
$sql = "SELECT * FROM users_crud  WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users_crud SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

   
    <?php renderNavbar("Edit User"); ?>


    <div class="container mx-auto py-8">
        <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
            <form method="post" action="edit.php?id=<?php echo $id; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" value="<?php echo $user['name']; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Update User
                    </button>
                    <a href="index.php" class="text-blue-600 hover:underline">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
