<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8 p-4 rounded shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Supported Coins List</h1>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Symbol</th>
                </tr>
            </thead>
            <tbody id="coinListTable"></tbody>
        </table>
    </div>
<script>
  const coinListTable = document.getElementById('coinListTable');

function fetchCoinList() {
    fetch('https://api.coingecko.com/api/v3/coins/list')
        .then(response => response.json())
        .then(data => {
            coinListTable.innerHTML = ''; // Clear the table body

            data.forEach(coin => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-2">${coin.id}</td>
                    <td class="px-4 py-2">${coin.name}</td>
                    <td class="px-4 py-2">${coin.symbol.toUpperCase()}</td>
                `;

                coinListTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error fetching coin list:', error);
        });
}

// Fetch the coin list on page load
fetchCoinList();
setInterval(fetchCoinList, 300000); // Fetch every 5 minutes (300,000 milliseconds)

</script>
</body>
</html>
