<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8 p-4 rounded shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Supported Exchange Markets List</h1>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                </tr>
            </thead>
            <tbody id="exchangeListTable"></tbody>
        </table>
    </div>
    <script>
      const exchangeListTable = document.getElementById('exchangeListTable');

function fetchExchangeList() {
    fetch('https://api.coingecko.com/api/v3/exchanges/list')
        .then(response => response.json())
        .then(data => {
            exchangeListTable.innerHTML = ''; // Clear the table body

            data.forEach(exchange => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-2">${exchange.id}</td>
                    <td class="px-4 py-2">${exchange.name}</td>
                `;

                exchangeListTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error fetching exchange list:', error);
        });
}

// Fetch the exchange list on page load
fetchExchangeList();
setInterval(fetchExchangeList, 300000); // Fetch every 5 minutes (300,000 milliseconds)

    </script>
</body>
</html>
