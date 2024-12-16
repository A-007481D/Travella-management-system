<?php
require_once('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['ActivityTitle'];
    $description = $_POST['Description'];
    $destination = $_POST['Destination'];
    $price = $_POST['Price'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $placesAvailable = $_POST['PlacesAvailable'];

    if (!empty($title) && !empty($description) && !empty($destination) && !empty($price) && !empty($startDate) && !empty($endDate) && !empty($placesAvailable)) {
        $insertData2 = "INSERT INTO activity (Title, Description, Destination, Price, Start_date, End_date, Places_available) 
    VALUES ('$title', '$description', '$destination', '$price', '$startDate', '$endDate', '$placesAvailable')";

        if (mysqli_query($DBconnect, $insertData2)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error: " . mysqli_error($DBconnect);
        }
    }
}



$fetchData = "SELECT * FROM  activity";
$result2 = mysqli_query($DBconnect, $fetchData);

if (!$result2) {
    die("Error fetching data: " . mysqli_error($DBconnect));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
    <title>Travella | Dashboard</title>
</head>

<body class="flex h-screen">
    <aside class="w-64 bg-[#1c2333] text-white flex flex-col">
        <div class="p-4 text-lg font-bold border-b border-gray-700">
            <a href="index.html" class="logo">
                <img width="100rem" src="img/travellalogo.png" alt="Travella Logo">
            </a>
            <p class="font-medium">Dashboard</p>
        </div>
        <nav class="flex-grow p-4 space-y-4">
            <!-- <a href="#statistics" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Statistics</a> -->
            <a href="dashboard.php" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Guests</a>
            <a href="activity.php" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Activities</a>
            <a href="reservation.php" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Reservations</a>
            <!-- <button class="block px-4 py-2 bg-blue-700 rounded hover:bg-blue-600">Add Activity</button>
            <button class="block px-4 py-2 bg-blue-700 rounded hover:bg-blue-600">Add Guest</button> -->
        </nav>
        <div class="p-4 border-t border-gray-700">
            <a href="index.html">
                <button class="w-full px-4 py-2 bg-blue-500 rounded hover:bg-blue-600">Logout</button>
            </a>
        </div>
    </aside>
    <main class="flex-grow bg-[#f2f6fa] overflow-auto">
        <header class="sticky top-0 drop-shadow px-5 w-full flex bg-white items-center">
            <div class="flex items-center w-1/2">
                <button class="hover:animate-pulse">
                    <svg width="26px" height="75px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                        <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                            stroke="#81868d" stroke-width="1.8719999999999999" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <input type="search"
                    class="w-full p-4 rounded-s font-thin text-gray-500 outline-none ml-4"
                    placeholder="Type to search...">
            </div>
            <div id="profile-stuff" class="flex items-center space-x-4 ml-auto">
                <div class="">
                    <span class="font-medium text-gray-900 ">Abdelmalek Labid</span>
                    <p class="font-normal text-gray-500 text-end">Developer</p>
                </div>
                <img src="img/moi.png" alt="Profile Picture" class="w-8 h-8 rounded-full cursor-pointer">
            </div>
        </header>
        <section id="guest-table" class="p-6">
            <div class="flex justify-between p-1">
                <h2 class="text-2xl font-semibold mb-4">Activity</h2>
                <button onclick="document.getElementById('AddActivityForm').classList.remove('hidden')" class="block px-4 bg-blue-600 rounded hover:bg-blue-700 text-white font-medium">New Activity</button>
            </div>
            <table class="w-full bg-white shadow rounded mb-5 table-fixed border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Activity ID</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Title</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Description</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Destination</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Price</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Start Date</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>End Date</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Places Available</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Controls</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result2)): ?>
                        <tr class="bg-white hover:bg-gray-100 cursor-pointer">
                                <td class="py-2 px-4 border truncate">#<?= $row['ActivityID'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['Title'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['Description'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['Destination'] ?></td>
                                <td class="py-2 px-4 border truncate">$<?= $row['Price'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['Start_date'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['End_date'] ?></td>
                                <td class="py-2 px-4 border truncate"><?= $row['Places_available'] ?></td>
                                <td class="py-2 px-4 border truncate flex gap-3 justify-center">
                                    <a href=""><button class="px-3 py-1 rounded-md bg-blue-500">Edit</button>
                                    </a> <a href="delActivity.php?id=<?php echo $row['ActivityID'] ?>"><button class="px-3 py-1 rounded-md bg-red-500">Delete</button></a> 
                                </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
    <form action="" method="POST" id="AddActivityForm" class="fixed inset-0 bg-black z-50 bg-opacity-50 hidden flex items-center justify-center">

        <div id="modal" class="container z-50 mx-auto p-6 rounded-md bg-gray-100 font-bold w-full sm:w-2/3 lg:w-1/3">
            <h2 class="text-4xl text-start break-normal mb-8 ml-2">New Activity
            </h2>
            <div class="space-y-6">

                <div class="flex space-x-4">
                    <!-- <div class="flex-1">
                <label class="ml-1">Activity ID</label>
                <input id="Activity ID" name="Activity ID" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                  placeholder="Activity ID" >
              </div> -->
                    <div class="flex-1">
                        <label class="ml-1">Title</label>
                        <input id="ActivityTitle" name="ActivityTitle" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                            placeholder="Activity Title">
                    </div>
                    <div class="flex-1">
                        <label class="ml-1">Description</label>
                        <input id="Description" name="Description" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                            placeholder="Description">
                    </div>
                    <div class="flex-1">
                        <label class="ml-1">Destination</label>
                        <input id="Destination" name="Destination" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                            placeholder="Destination">
                    </div>
                </div>
                <div class="flex space-x-4">

                    <div class="flex-1">
                        <label class="ml-1">Start Date</label>
                        <input id="StartDate" name="StartDate" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="date"
                            placeholder="Start Date">
                    </div>
                    <div class="flex-1">
                        <label class="ml-1">End Date</label>
                        <input id="End Date" name="EndDate" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="date"
                            placeholder="End Date">
                    </div>

                </div>
                <div class="flex space-x-4">

                    <div class="flex-1">
                        <label class="ml-1">Price</label>
                        <input id="Price" name="Price" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="number"
                            placeholder="499$">
                    </div>
                    <div class="flex-1">
                        <label class="ml-1">Places Available</label>
                        <input id="PlacesAvailable" name="PlacesAvailable" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="number"
                            placeholder="123">
                    </div>

                </div>
                <div class="flex justify-start space-x-4 mt-4">
                    <button type="submit" id="AddGuest" class="AddGuest bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md px-7 py-2">Add</button>
                    <button type="button" onclick="document.getElementById('AddActivityForm').classList.add('hidden')" class=" sm:bg-red-500  bg-gray-500 hover:bg-red-700 text-black font-medium rounded-md px-4 py-2">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>