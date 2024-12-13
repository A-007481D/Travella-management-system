<?php
require_once ('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $F_name = $_POST['GuestName'];
    $L_name = $_POST['GuestLastName'];
    $Email = $_POST['GuestEmail'];
    $Telephone = $_POST['GuestTelephone'];
    $Address = $_POST['GuestAddress'];
    $Birthday = $_POST['GuestBirthD'];

    $insertData = "INSERT INTO client (First_name, Last_name, Email, Telephone, Address, Birth_date) 
    VALUES ('$F_name', '$L_name', '$Email', '$Telephone', '$Address', '$Birthday')";

    if (mysqli_query($DBconnect, $insertData)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . mysqli_error($DBconnect);
    }
}
$fetchData = "SELECT * FROM  client";
$result = mysqli_query($DBconnect, $fetchData);

if (!$result) {
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
            <a href="#statistics" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Statistics</a>
            <a href="#guests" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Guests</a>
            <a href="dashractivity.html" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Activities</a> 
            <a href="dashreserv.html" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Reservations</a>
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
        <section id="statistics" class="mb-8 p-6">
            <h2 class="text-2xl font-semibold mb-4">Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 bg-white shadow-md hover:shadow-2xl duration-500 hover:bg-green-300 cursor-pointer rounded">
                    <h3 class="text-lg font-medium">Active Users</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
                <div class="p-4 bg-white shadow-md hover:shadow-2xl duration-500 hover:bg-green-300  cursor-pointer rounded">
                    <h3 class="text-lg font-medium">Active Reservations</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
                <div class="p-4 bg-white shadow-md hover:shadow-2xl duration-500 hover:bg-blue-300  cursor-pointer rounded">
                    <h3 class="text-lg font-medium">New Signups</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </section>
        <section id="guest-table" class="p-6">
            <div class="flex justify-between p-1">
                <h2 class="text-2xl font-semibold mb-4">Guests</h2>
                <button onclick="document.getElementById('AddGuestForm').classList.remove('hidden')" class="block px-4 bg-blue-600 rounded hover:bg-blue-700 text-white font-medium">Add Guest</button>
            </div>
            <table class="w-full bg-white shadow rounded mb-5 table-fixed border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>ID</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>First Name</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Last Name</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Email</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Phone</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Address</span>
                            <!-- <span class="ml-2 transform group-hover:scale-110 transition-transform">
                                ▲
                            </span>
                            <span class="ml-1 transform group-hover:scale-110 transition-transform opacity-50">
                                ▼
                            </span> -->
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Birth Date</span>
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
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="bg-white hover:bg-gray-100 cursor-pointer">
                        <td class="py-2 px-4 border truncate"><?= $row['ClientID'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['First_name'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['Last_name'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['Email'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['Telephone'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['Address'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $row['Birth_date'] ?></td>
                        <td class="py-2 px-4 border truncate">Edit Delete</td>
                    </tr>
                <?php endwhile; ?>
                </tr>
                </tbody>
            </table>
        </section>
    </main>
    <form action="" method="POST" id="AddGuestForm" class="fixed inset-0 bg-black z-50 bg-opacity-50 hidden flex items-center justify-center">

        <div id="modal" class="container z-50 mx-auto p-6 rounded-md bg-gray-100 font-bold w-full sm:w-2/3 lg:w-1/3">
          <h2 class="text-4xl text-start break-normal mb-8 ml-2">New Guest
          </h2>
          <div class="space-y-6">
    
            <div class="flex space-x-4">
              <div class="flex-1">
                <label class="ml-1">First Name</label>
                <input id="GuestName" name="GuestName" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                  placeholder="Guest first name" >
              </div>
              <div class="flex-1">
                <label class="ml-1">Last Name</label>
                <input id="GuestLastName" name="GuestLastName" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                  placeholder="Guest last name" >
              </div>
            </div>
    
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="ml-1">Email</label>
                    <input id="GuestEmail" name="GuestEmail" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="email"
                      placeholder="Guest Email" >
                  </div>
                  <div class="flex-1">
                    <label class="ml-1">Telephone</label>
                    <input id="GuestTelephone" name="GuestTelephone" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="number"
                      placeholder="Guest phone number" >
                  </div>
            </div>
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="ml-1">Address</label>
                    <input id="GuestAddress" name="GuestAddress" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="text"
                      placeholder="Guest Address" >
                  </div>
                  <div class="flex-1">
                    <label class="ml-1">Birth Date</label>
                    <input id="GuestBirthD" name="GuestBirthD" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200" type="date"
                      placeholder="Guest Birth Date" >
                  </div>
            </div>
            <div class="flex justify-start space-x-4 mt-4">
              <button type="submit" id="AddGuest" class="AddGuest bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md px-7 py-2">Add
              </button>
              <button type="button" onclick="document.getElementById('AddGuestForm').classList.add('hidden')"
                class=" sm:bg-red-500  bg-gray-500 hover:bg-red-700 text-black font-medium rounded-md px-4 py-2">Cancel
              </button>
            </div>
          </div>
        </div>
    </form>
</body>
</html>
