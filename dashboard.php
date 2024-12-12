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
        
    </aside>
        <main class="flex-grow bg-[#f2f6fa] overflow-auto">
        <header class="sticky top-0 drop-shadow px-5 w-full flex bg-white items-center">
            <div class="flex items-center w-1/2">
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
                <div class="p-4 bg-white shadow-md duration-500 cursor-pointer rounded">
                    <h3 class="text-lg font-medium">Active Users</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
                <div class="p-4 bg-white shadow-md duration-500 cursor-pointer rounded">
                    <h3 class="text-lg font-medium">Active Reservations</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
                <div class="p-4 bg-white shadow-md duration-500 cursor-pointer rounded">
                    <h3 class="text-lg font-medium">New Signups</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </section>
        <section id="guest-table" class="p-6">
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
                     <tr class="bg-white hover:bg-gray-100 cursor-pointer">
                        <td class="py-2 px-4 border truncate">7</td>
                        <td class="py-2 px-4 border truncate">Abdelmalek</td>
                        <td class="py-2 px-4 border truncate">Labid</td>
                        <td class="py-2 px-4 border truncate">a.labid@gmail.com</td>
                        <td class="py-2 px-4 border truncate">0656558898</td>
                        <td class="py-2 px-4 border truncate">addresss</td>
                        <td class="py-2 px-4 border truncate">1000-100-100</td>
                        <td class="py-2 px-4 border truncate">Delete Edit</td>
            </table>
        </section>
    </main>
    
</body>
</html>
