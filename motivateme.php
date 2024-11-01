<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>        <title>MotivateMe - Inspire Yourself</title>
</head>
<body>

    <!-- Header section -->
    <header class="bg-blue-500 py-4">
        <?php include('header.php'); ?>
    </header>

    <!-- MotivateMe section -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-semibold">MotivateMe - Inspire Yourself</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">

<?php
// Fetch random motivational quotes from the API
$apiUrl = 'https://api.quotable.io/quotes/random?limit=6';
$quotesData = file_get_contents($apiUrl);
$quotesData = json_decode($quotesData, true);

if (!empty($quotesData)) {
    // Iterate through the quotes and display them in individual divs
    foreach ($quotesData as $quote) {
        echo '<div class="bg-white p-4 rounded-md shadow-md mt-4">';
        echo '<p class="text-gray-700">' . $quote['content'] . '</p>';
        echo '<p class="text-gray-600 font-semibold">- ' . $quote['author'] . '</p>';
        
        // Display tags if available
        if (!empty($quote['tags'])) {
            echo '<p class="text-gray-600">Tags: ' . implode(', ', $quote['tags']) . '</p>';
        }

        echo '</div>';
    }
} else {
    echo '<p class="text-gray-600">Unable to fetch motivational quotes at the moment. Please try again later.</p>';
}
?>


            </div>
        </div>
    </section>

    <!-- Footer section -->
    <footer class="bg-blue-500 py-4">
        <?php include('footer.php'); ?>
    </footer>

</body>
</html>
