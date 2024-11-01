<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- Include Header -->
    <header class="bg-blue-500 py-4">
        <?php include('header.php'); ?>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 p-4 rounded shadow-lg max-w-md">
        <h1 class="text-2xl font-semibold mb-4">Crypto Converter</h1>
        <div class="flex justify-between items-center mb-4">
            <label for="cryptoSelect">Select Cryptocurrency:</label>
            <select id="cryptoSelect" class="border p-2 rounded">
                <option value="bitcoin">Bitcoin (BTC)</option>
                <option value="ethereum">Ethereum (ETH)</option>
                <option value="ripple">Ripple (XRP)</option>
                <option value="litecoin">Litecoin (LTC)</option>
                <option value="cardano">Cardano (ADA)</option>
                <option value="dogecoin">Dogecoin (DOGE)</option>
            </select>
        </div>
        <div class="flex justify-between items-center mb-4">
            <label for="cryptoAmount">Enter Amount:</label>
            <input type="number" id="cryptoAmount" class="border p-2 rounded" placeholder="Enter Amount">
        </div>
        <div>
            <h2 class="text-lg font-semibold">USD:</h2>
            <p class="mb-2">Conversion: <span id="usdConversion" class="font-semibold">N/A</span></p>
        </div>
        <div>
            <h2 class="text-lg font-semibold mt-4">EUR:</h2>
            <p class="mb-2">Conversion: <span id="eurConversion" class="font-semibold">N/A</span></p>
        </div>
    </div>

    <!-- Include Footer -->
    <footer class="bg-blue-500 py-4">
        <?php include('footer.php'); ?>
    </footer>


    <script>
const cryptoSelect = document.getElementById('cryptoSelect');
const cryptoAmountInput = document.getElementById('cryptoAmount');
const usdConversionElement = document.getElementById('usdConversion');
const eurConversionElement = document.getElementById('eurConversion');

const updateConversion = () => {
    const selectedCrypto = cryptoSelect.value;
    const cryptoAmount = parseFloat(cryptoAmountInput.value);

    if (isNaN(cryptoAmount) || cryptoAmount <= 0) {
        usdConversionElement.textContent = 'N/A';
        eurConversionElement.textContent = 'N/A';
        return;
    }

    fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${selectedCrypto}&vs_currencies=usd,eur`)
        .then(response => response.json())
        .then(data => {
            const usdPrice = data[selectedCrypto].usd;
            const eurPrice = data[selectedCrypto].eur;

            const usdConversion = (cryptoAmount * usdPrice).toFixed(2);
            const eurConversion = (cryptoAmount * eurPrice).toFixed(2);

            usdConversionElement.textContent = `$${usdConversion} USD`;
            eurConversionElement.textContent = `${eurConversion} EUR`;
        })
        .catch(error => {
            console.error('Error fetching cryptocurrency price:', error);
        });
};

cryptoSelect.addEventListener('change', updateConversion);
cryptoAmountInput.addEventListener('input', updateConversion);

// Initialize conversion on page load
updateConversion();

    </script>
</body>
</html>
