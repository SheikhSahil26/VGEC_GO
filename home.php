<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VGEC GO - Campus Navigator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px; /* Thin scrollbar */
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9; /* Light background for track */
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3b82f6; /* Blue scrollbar */
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2563eb; /* Darker blue on hover */
        }
        
        /* Webkit browser support for scrollbar styling */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #3b82f6 #f1f5f9;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f4f7fa;
            min-height: 100vh;
            margin: 0;
        }
        
        /* Responsive Grid Layout */
        .campus-container {
            display: grid;
            grid-template-columns: 1fr;
            min-height: 100vh;
        }
        
        @media (min-width: 1024px) {
            .campus-container {
                grid-template-columns: 2fr 1fr;
            }
        }
        
        .map-section {
            position: relative;
            overflow: hidden;
            height: 50vh;
        }
        
        @media (min-width: 1024px) {
            .map-section {
                height: 100vh;
            }
        }
        
        .map-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .block {
            position: absolute;
            opacity: 0.5;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        .block:hover {
            opacity: 0.8;
            transform: scale(1.1);
            z-index: 10;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .details-section {
            background-color: white;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            overflow: hidden;
            height: 50vh;
        }
        
        @media (min-width: 1024px) {
            .details-section {
                height: 100vh;
            }
        }
        
        .block-info-list {
            overflow-y: auto;
            max-height: calc(100vh - 300px);
            padding-right: 0.5rem;
        }
        
        /* Mobile-friendly adjustments */
        @media (max-width: 640px) {
            .campus-container {
                grid-template-rows: auto auto;
            }
            
            .map-section, .details-section {
                height: auto;
            }
            
            .search-container, .block-info-list {
                max-height: none;
            }
        }
        
        
    </style>
</head>
<body class="bg-gray-50">
    <div class="campus-container">
        <!-- Map Section -->
        <div class="map-section relative">
            <img src="./sitemap.jpg" alt="Campus Map" class="map-image">
            
            <!-- Blocks with dynamic positioning -->
            <div class="block" onclick="showInfo('A')" style="left: 66%; top: 55%; width: 7%; height: 9%; "></div>
            <div class="block" onclick="showInfo('B')" style="left: 58%; top: 64%; width: 8%; height: 9%; "></div>
            <div class="block" onclick="showInfo('C')" style="left: 52%; top: 53%; width: 7%; height: 9%; "></div>
            <div class="block" onclick="showInfo('D')" style="left: 46%; top: 63%; width: 7%; height: 10%; "></div>
            <div class="block" onclick="showInfo('E')" style="left: 38%; top: 55%; width: 8%; height: 8%; "></div>
            <div class="block" onclick="showInfo('F')" style="left: 46%; top: 43%; width: 7%; height: 10%;"></div>
            <div class="block" onclick="showInfo('G')" style="left: 39%; top: 34%; width: 7%; height: 9%; "></div>
            <div class="block" onclick="showInfo('H')" style="left: 46%; top: 24%; width: 9%; height: 11%;"></div>
            <div class="block" onclick="showInfo('I')" style="left: 53%; top: 35%; width: 8%; height: 9%; "></div>
            <div class="block" onclick="showInfo('J')" style="left: 61%; top: 25%; width: 8%; height: 11%; "></div>
            <div class="block" onclick="showInfo('K')" style="left: 68%; top: 36%; width: 7%; height: 10%; "></div>
            <div class="block" onclick="showInfo('L')" style="left: 60%; top: 46%; width: 7%; height: 8%; "></div>
            <div class="block" onclick="showInfo('M')" style="left: 49%; top: 4%; width: 7%; height: 11%; "></div>
            <div class="block" onclick="showInfo('N')" style="left: 37%; top: 10%; width: 48px; height: 8%; "></div>
        </div>

        <!-- Details Section -->
        <div class="details-section overflow-y-auto">
            <!-- Search Container -->
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="ri-search-line mr-2 text-blue-600"></i>
                    Faculty Search
                </h2>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                    <input 
                        type="text" 
                        id="facultyName" 
                        class="flex-grow p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Faculty Name"
                    >
                    <button 
                        onclick="searchFaculty()" 
                        class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors"
                    >
                        Search
                    </button>
                </div>
                <div id="facultySearchResult" class="mt-3 text-sm"></div>
            </div>

            <!-- Block Info Container -->
            <div class="flex-grow overflow-hidden">
                <h2 id="infoTitle" class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">
                    <i class="ri-building-line mr-2 text-blue-600"></i>
                    Select a Block
                </h2>
                <div id="blockInfoList" class="block-info-list custom-scrollbar overflow-y-auto pr-2">
                    <p class="text-gray-500 text-center">Click on a block in the campus map to see its details.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let at_time_slot = 1;
        let day = 'MON';

        function showInfo(blockId) {
            // Remove active class from all blocks
            document.querySelectorAll('.block').forEach(block => {
                block.classList.remove('active');
            });

            // Add active class to selected block
            const selectedBlock = document.querySelector(`.block[data-block="${blockId}"]`);
            if (selectedBlock) {
                selectedBlock.classList.add('active');
            }

            const infoTitle = document.getElementById('infoTitle');
            const blockInfoList = document.getElementById('blockInfoList');
            
            // Clear previous content
            blockInfoList.innerHTML = '';
            
            // Send AJAX request to fetch data
            fetch(`getBlockData.php?blockId=${blockId}&at_time_slot=${at_time_slot}&day=${day}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        infoTitle.innerHTML = `<i class="ri-error-warning-line mr-2 text-red-600"></i> Error`;
                        blockInfoList.innerHTML = `<p class="text-red-500">${data.error}</p>`;
                    } else {
                        // Update title
                        infoTitle.innerHTML = `<i class="ri-building-line mr-2 text-blue-600"></i> Block ${blockId} Details`;
                        
                        // Create info items for each room
                        data.forEach(item => {
                            const infoItem = document.createElement('div');
                            infoItem.classList.add(
                                'block-info-item', 
                                'bg-gray-100', 
                                'rounded-lg', 
                                'p-4', 
                                'mb-3', 
                                'flex', 
                                'justify-between', 
                                'items-center', 
                                'hover:bg-gray-200', 
                                'transition-colors'
                            );
                            infoItem.innerHTML = `
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">${item.name}</h3>
                                    <p class="text-sm text-gray-600">Block ${item.block} - Room ${item.room_no}</p>
                                </div>
                                <div class="text-blue-600 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>
                            `;
                            blockInfoList.appendChild(infoItem);
                        });
                    }
                })
                .catch(error => {
                    infoTitle.innerHTML = `<i class="ri-error-warning-line mr-2 text-red-600"></i> Error`;
                    blockInfoList.innerHTML = `<p class="text-red-500">An error occurred while retrieving the data.</p>`;
                    console.error('Error:', error);
                });
        }

        function searchFaculty() {
            const facultyName = document.getElementById('facultyName').value.trim();
            const facultySearchResult = document.getElementById('facultySearchResult');

            // Clear previous search results
            facultySearchResult.innerHTML = '';

            // Check if faculty name is provided
            if (!facultyName) {
                facultySearchResult.innerHTML = '<p class="text-red-500 flex items-center"><i class="ri-warning-line mr-1"></i>Please enter a faculty name to search.</p>';
                return;
            }

            // Send AJAX request to fetch faculty data
            fetch(`getFacultySearch.php?facultyName=${facultyName}&at_time_slot=${at_time_slot}&day=${day}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        facultySearchResult.innerHTML = `<p class="text-red-500 flex items-center"><i class="ri-error-warning-line mr-1"></i>${data.error}</p>`;
                    } else {
                        const locationInfo = data[0].block && data[0].room_no 
                            ? `<i class="ri-map-pin-line mr-1 text-blue-600"></i>Location: ${data[0].block} - ${data[0].room_no}` 
                            : '<i class="ri-map-pin-line mr-1 text-gray-400"></i>Location not available';

                        facultySearchResult.innerHTML = `
                            <div class="bg-blue-50 p-3 rounded-md shadow-sm">
                                <p class="text-green-600 font-semibold flex items-center">
                                    <i class="ri-user-line mr-2"></i>${data[0].name}
                                </p>
                                <p class="text-gray-600 mt-1">${locationInfo}</p>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    facultySearchResult.innerHTML = '<p class="text-red-500 flex items-center"><i class="ri-error-warning-line mr-1"></i>An error occurred while retrieving the faculty data.</p>';
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>