<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Coins</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8 p-4 rounded shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Top 7 Trending Coins on CoinGecko</h1>
        <ul id="trendingCoinsList" class="list-inside list-disc"></ul>
    </div>
<script>
  const trendingCoinsList = document.getElementById('trendingCoinsList');

function fetchTrendingCoins() {
    fetch('https://api.coingecko.com/api/v3/search/trending')
        .then(response => response.json())
        .then(data => {
            trendingCoinsList.innerHTML = ''; // Clear the list

            const trendingCoins = data.coins.slice(0, 7); // Get the top 7 trending coins

            trendingCoins.forEach(coin => {
                const listItem = document.createElement('li');
                listItem.textContent = `${coin.item.name} (${coin.item.symbol.toUpperCase()})`;
                trendingCoinsList.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error('Error fetching trending coins:', error);
        });
}

// Fetch trending coins on page load
fetchTrendingCoins();

// Refresh trending coins every 10 minutes
setInterval(fetchTrendingCoins, 600000); // 10 minutes in milliseconds

</script>  

</body>
</html>
