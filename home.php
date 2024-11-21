<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Map Explorer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .campus-container {
            max-width: 1100px;
            margin: 2rem auto;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            overflow: hidden;
        }
        .map-section {
            background-color: white;
            position: relative;
            max-height: 600px;
            overflow: hidden;
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
            background-color: #ffffff;
            border-left: 2px solid #e5e7eb;
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }
        .details-header {
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
        .details-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #4a5568;
            overflow-y: auto; /* Allow vertical scrolling without x-axis scrollbar */
            max-height: 400px; /* Limit height to prevent overflow */
        }
        .block-info-list {
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        .block-info-item {
            background-color: #f7fafc;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            width: calc(100% - 2px); /* Prevent scrollbar appearance */
        }
        .block-info-item:hover {
            background-color: #f0f9ff;
            transform: translateX(2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 1rem;
        }
        .logo-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1E6198;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="logo-container">
        <span class="logo-text">VGEC GO</span>
    </div>
    <div class="campus-container grid grid-cols-3 bg-white">
        <!-- Map Section (Kept same as previous version) -->
        <div class="map-section col-span-2 relative">
            <img src="./sitemap.jpg" alt="Campus Map" class="map-image">
            
            <!-- Blocks with dynamic positioning and colors -->
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
        <div class="details-section col-span-1">
            <div class="details-header">
                <h2 id="infoTitle" class="text-2xl font-bold text-gray-800">Select a Block</h2>
            </div>
            <div class="details-content">
                <div id="blockInfoList" class="block-info-list">
                    <p class="text-gray-500">Click on a block in the campus map to see its details.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let at_time_slot = 5;
        let day = 'MON';

        function showInfo(blockId) {
            const infoTitle = document.getElementById('infoTitle');
            const blockInfoList = document.getElementById('blockInfoList');
            
            // Clear previous content
            blockInfoList.innerHTML = '';
            
            // Send AJAX request to fetch data
            fetch(`getBlockData.php?blockId=${blockId}&at_time_slot=${at_time_slot}&day=${day}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        infoTitle.textContent = `Error`;
                        blockInfoList.innerHTML = `<p class="text-red-500">${data.error}</p>`;
                    } else {
                        // Update title
                        infoTitle.textContent = `Block ${blockId} Details`;
                        
                        // Create info items for each room
                        data.forEach(item => {
                            const infoItem = document.createElement('div');
                            infoItem.classList.add('block-info-item');
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
                    infoTitle.textContent = `Error`;
                    blockInfoList.innerHTML = `<p class="text-red-500">An error occurred while retrieving the data.</p>`;
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>