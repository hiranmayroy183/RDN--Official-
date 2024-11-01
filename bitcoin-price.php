<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Price Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8 p-4 rounded shadow-lg max-w-md">
        <h1 class="text-2xl font-semibold mb-4">Crypto Price Checker</h1>
        <div class="flex justify-between items-center mb-4">
            <label for="cryptoSelect">Select Cryptocurrency:</label>
            <select id="cryptoSelect" class="border p-2 rounded">
                <option value="bitcoin">Bitcoin (BTC)</option>
                <option value="ethereum">Ethereum (ETH)</option>
                <option value="ripple">Ripple (XRP)</option>
                <option value="litecoin">Litecoin (LTC)</option>
                <option value="cardano">Cardano (ADA)</option>
                <option value="dogecoin">Dogecoin (DOGE)</option>
                <option value="polkadot">Polkadot (DOT)</option>
                <option value="binancecoin">Binance Coin (BNB)</option>
            </select>
        </div>
        <div>
            <h2 class="text-lg font-semibold">USD:</h2>
            <p class="mb-2">Low: <span id="usdLow" class="font-semibold">N/A</span></p>
            <p class="mb-2">High: <span id="usdHigh" class="font-semibold">N/A</span></p>
            <p>Last: <span id="usdLast" class="font-semibold">N/A</span></p>
        </div>
        <div>
            <h2 class="text-lg font-semibold mt-4">EUR:</h2>
            <p class="mb-2">Low: <span id="eurLow" class="font-semibold">N/A</span></p>
            <p class="mb-2">High: <span id="eurHigh" class="font-semibold">N/A</span></p>
            <p>Last: <span id="eurLast" class="font-semibold">N/A</span></p>
        </div>
    </div>
<script>
  const cryptoSelect = document.getElementById('cryptoSelect');
const usdLowElement = document.getElementById('usdLow');
const usdHighElement = document.getElementById('usdHigh');
const usdLastElement = document.getElementById('usdLast');
const eurLowElement = document.getElementById('eurLow');
const eurHighElement = document.getElementById('eurHigh');
const eurLastElement = document.getElementById('eurLast');

const updateCryptoData = () => {
    const selectedCrypto = cryptoSelect.value;

    fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${selectedCrypto}&vs_currencies=usd,eur`)
        .then(response => response.json())
        .then(data => {
            const usdPrice = data[selectedCrypto].usd;
            const eurPrice = data[selectedCrypto].eur;

            usdLowElement.textContent = `$${usdPrice.toFixed(2)} USD`;
            usdHighElement.textContent = `$${(usdPrice * 1.1).toFixed(2)} USD`; // Assume a 10% high value for demonstration
            usdLastElement.textContent = `$${usdPrice.toFixed(2)} USD`;

            eurLowElement.textContent = `${(usdPrice * 0.85).toFixed(2)} EUR`; // Assume a conversion rate of 0.85
            eurHighElement.textContent = `${(usdPrice * 0.95).toFixed(2)} EUR`; // Assume a conversion rate of 0.95
            eurLastElement.textContent = `${eurPrice.toFixed(2)} EUR`;
        })
        .catch(error => {
            console.error('Error fetching cryptocurrency data:', error);
        });
};

cryptoSelect.addEventListener('change', updateCryptoData);

// Initialize cryptocurrency data on page load
updateCryptoData();

</script>
</body>
</html>
