<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CodeBeat - Jokes About Programming</title>
  </head>
<body>

    <!-- Header section -->
    <header class="bg-blue-500 py-4">
        <?php include('header.php'); ?>
    </header>

    <!-- CodeBeat section -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-semibold">CodeBeat - Jokes About Programming</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                <?php
// Function to fetch and display 10 coding jokes
function fetchCodingJokes() {
    for ($i = 0; $i < 9; $i++) {
        $jokeData = file_get_contents('https://v2.jokeapi.dev/joke/Programming?type=single');
        $jokeData = json_decode($jokeData, true);

        echo '<div class="bg-white p-4 rounded-md shadow-md">';
        echo '<p class="text-gray-700">' . $jokeData['joke'] . '</p>';
        echo '</div>';
    }
}

// Call the function to display coding jokes
fetchCodingJokes();
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
