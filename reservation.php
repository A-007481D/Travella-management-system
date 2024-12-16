<?php
require_once ('dbConnect.php');

$fetchClient = "SELECT ClientID, First_name, Last_name FROM client";
$clientResult = mysqli_query($DBconnect, $fetchClient);

$fetchActivity = "SELECT ActivityID, Title FROM activity";
$activityResult = mysqli_query($DBconnect, $fetchActivity);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientID = $_POST['ClientID'];
    $activityID = $_POST['ActivityID'];
    $status = $_POST['ReservStatus'];
    
    if (!empty($clientID) && !empty($activityID) && !empty($status)) {
        $insertData = "INSERT INTO reservation (ClientID, ActivityID, Status) VALUES ('$clientID', '$activityID', '$status')";

        if (mysqli_query($DBconnect, $insertData )) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error: " . mysqli_error($DBconnect);
        }    
    }
}

$fetchReservs = "SELECT ReservationID, ClientID, ActivityID, Reservation_date, Status FROM reservation";
$reservResult = mysqli_query($DBconnect, $fetchReservs);


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
                        <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#81868d" stroke-width="1.8719999999999999" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <input type="search" class="w-full p-4 rounded-s font-thin text-gray-500 outline-none ml-4" placeholder="Type to search...">
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
                <h2 class="text-2xl font-semibold mb-4">Current Reservations</h2>
                <button onclick="document.getElementById('AddReservationForm').classList.remove('hidden')" class="block px-4 bg-blue-600 rounded hover:bg-blue-700 text-white font-medium">New Reservations</button>
            </div>
            <table class="w-full bg-white shadow rounded mb-5 table-fixed border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Reservation ID</span>
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Client ID</span>
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Activity ID</span>
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Reservation_date</span>
                        </th>
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Status</span>
                        </th>   
                        <th class="px-4 py-2 text-left truncate cursor-pointer group">
                            <span>Controls</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reservation = mysqli_fetch_assoc($reservResult)): ?>
                    <tr class="bg-white hover:bg-gray-100 cursor-pointer">
                        <td class="py-2 px-4 border truncate">#<?= $reservation['ReservationID'] ?></td>
                        <td class="py-2 px-4 border truncate">#<?= $reservation['ClientID']?></td>
                        <td class="py-2 px-4 border truncate">#<?= $reservation['ActivityID'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $reservation['Reservation_date'] ?></td>
                        <td class="py-2 px-4 border truncate"><?= $reservation['Status'] ?></td>
                        <td class="py-2 px-4 border truncate flex gap-3 justify-center">
                            <a href=""><button class="px-4 py-1 rounded-md bg-blue-500">Edit</button>
                            </a> <a href="delReserv.php?id=<?php echo $reservation['ReservationID'] ?>"><button class="px-3 py-1 rounded-md bg-red-500">Delete</button></a> 
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
    <form action="" method="POST" id="AddReservationForm" class="fixed inset-0 bg-black z-50 bg-opacity-50 hidden flex items-center justify-center">
        <div id="modal" class="container z-50 mx-auto p-6 rounded-md bg-gray-100 font-bold w-full sm:w-2/3 lg:w-1/3">
            <h2 class="text-4xl text-start break-normal mb-8 ml-2">New Reservation</h2>
            <div class="space-y-6">
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="ml-1">Client</label>
                        <select id="ClientID" name="ClientID" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200">
                            <option value="">Select a client</option>
                            <?php while($client = mysqli_fetch_assoc($clientResult)): ?>
                                <option value="<?php echo $client['ClientID']; ?>"><?php echo $client['First_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="ml-1">Activity</label>
                        <select id="ActivityID" name="ActivityID" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200">
                            <option value="">Select an activity</option>
                            <?php while($activity = mysqli_fetch_assoc($activityResult)): ?>
                                <option value="<?php echo $activity['ActivityID']; ?>"><?php echo $activity['Title']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="ml-1">Reservation Status</label>
                        <select id="ReservStatus" name="ReservStatus" class="rounded-lg px-3 py-2 h-12 w-full bg-white-200">
                            <option value="">Select a Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-start space-x-4 mt-4">
                    <button type="submit" class="w-full py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">Save</button>
                    <button type="button" class="w-full py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700" onclick="document.getElementById('AddReservationForm').classList.add('hidden')">Close</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
