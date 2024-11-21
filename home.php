<!DOCTYPE html>
<html>
<head>
    <title>Clickable Image Blocks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
        }
        .image-container {
            position: relative;
            flex: 3;
        }
        .info-container {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 1px solid #ddd;
        }
        .info-container h2 {
            margin-top: 0;
        }
        .block {
            position: absolute;
            opacity: 0.3;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Image and clickable blocks -->
        <div class="image-container">
            <img src="./sitemap.jpg" alt="Campus Map" style="width:100%;">
            
            <!-- Add blocks for each section -->
            <div class="block" onclick="showInfo('A')" style="left: 66%; top: 55%; width: 7%; height: 9%; background-color: blue;"></div>
            <div class="block" onclick="showInfo('B')" style="left: 58%; top: 64%; width: 8%; height: 9%; background-color: red;"></div>
            <div class="block" onclick="showInfo('C')" style="left: 52%; top: 53%; width: 7%; height: 9%; background-color: green;"></div>
            <div class="block" onclick="showInfo('D')" style="left: 46%; top: 63%; width: 7%; height: 10%; background-color: yellow;"></div>
            <div class="block" onclick="showInfo('E')" style="left: 38%; top: 55%; width: 8%; height: 8%; background-color: purple;"></div>
            <div class="block" onclick="showInfo('F')" style="left: 46%; top: 43%; width: 7%; height: 10%; background-color: orange;"></div>
            <div class="block" onclick="showInfo('G')" style="left: 39%; top: 34%; width: 7%; height: 9%; background-color: black;"></div>
            <div class="block" onclick="showInfo('H')" style="left: 46%; top: 24%; width: 9%; height: 11%; background-color: brown;"></div>
            <div class="block" onclick="showInfo('I')" style="left: 53%; top: 35%; width: 8%; height: 9%; background-color: cyan;"></div>
            <div class="block" onclick="showInfo('J')" style="left: 61%; top: 25%; width: 8%; height: 11%; background-color: lime;"></div>
            <div class="block" onclick="showInfo('K')" style="left: 68%; top: 36%; width: 7%; height: 10%; background-color: gold;"></div>
            <div class="block" onclick="showInfo('L')" style="left: 60%; top: 46%; width: 7%; height: 8%; background-color: grey;"></div>
            <div class="block" onclick="showInfo('M')" style="left: 49%; top: 4%; width: 7%; height: 11%; background-color: indigo;"></div>
            <div class="block" onclick="showInfo('N')" style="left: 37%; top: 10%; width: 48px; height: 8%; background-color: teal;"></div>
        </div>

        <!-- Info section -->
        <div class="info-container">
            <h2 id="infoTitle">Select a Block</h2>
            <p id="infoContent"></p>
        </div>
    </div>

    <script>
        let at_time_slot=5;
        let day = 'MON';
        // Block information
        const blockContents = {
            A: "Information about Block A",
            B: "Details of Block B",
            C: "Features of Block C",
            D: "Facilities in Block D",
            E: "Block E description",
            F: "Block F highlights",
            G: "Specifics of Block G",
            H: "Block H overview",
            I: "Block I details",
            J: "Block J summary",
            K: "Block K insights",
            L: "Block L focus",
            M: "Block M features",
            N: "Block N explanation"
        };

        // Show information in the right section
        function showInfo(blockId) {
    const infoTitle = document.getElementById('infoTitle');
    const infoContent = document.getElementById('infoContent');
    
    // Send AJAX request to fetch data
    fetch(`getBlockData.php?blockId=${blockId}&at_time_slot=${at_time_slot}&day=${day}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                // Display error message
                infoTitle.textContent = `Error`;
                infoContent.textContent = data.error;
            } else {
                // Display fetched data
                console.log(data);
                infoTitle.textContent = `Block ${data[0].block} Details`;
                for(let i=0;i<data.length;i++){
                    infoContent.textContent += data[i].name; // Adjust based on your DB structure
                }
            }
        })
        .catch(error => {
            // Handle errors
            infoTitle.textContent = `Error`;
            infoContent.textContent = 'An error occurred while retrieving the data.';
            console.error('Error:', error);
        });
}

    </script>
</body>
</html>
