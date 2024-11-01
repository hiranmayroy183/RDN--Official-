<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Roy Digital Nexus: A new way to explore the world</title>
</head>
<body>
  
  
  <!-- Header section -->
<header class="bg-blue-500 py-4">
    <nav class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="index.php" class="text-white text-2xl font-bold">RDN</a>
        <ul class="flex space-x-4">
            <li><a href="index.php" class="text-white hover:text-blue-200">Home</a></li>
            <li><a href="https://roydigitalnexus.com/tools" class="text-white hover:text-blue-200">Tools</a></li>
            <li><a href="codebeat.php" class="text-white hover:text-blue-200">CodeBeat</a></li>
            <li><a href="motivateme.php" class="text-white hover:text-blue-200">MotivateMe</a></li>
            <li><a href="codingjumpper.php" class="text-white hover:text-blue-200">Coding Jumpper</a></li>
            <li><a href="contact.php" class="text-white hover:text-blue-200">Contact</a></li>
        </ul>
    </nav>
    <div class="header-content container mx-auto py-16 text-center">
        <h1 class="text-4xl font-semibold text-white">Home</h1>
        <!-- CodeBeat section -->
        <div class="bg-gray-100 p-4 rounded-lg mt-8">
            <h2 class="text-xl font-semibold">CodeBeat (A Joke About Programming)</h2>
          <br>
            <?php
// Fetch the programming joke from the API
$jokeData = file_get_contents('https://v2.jokeapi.dev/joke/Programming?type=single');
$jokeData = json_decode($jokeData, true);

// Check if the response has a multiline joke
if (strpos($jokeData['joke'], "\n")) {
    // Split the joke into lines
    $jokeLines = explode("\n", $jokeData['joke']);
    
    // Display each line with a "Person:" prefix
    foreach ($jokeLines as $index => $line) {
        echo ($index % 2 === 0 ? '<b>First Person:</b>' : '<b>Second Person:</b>') . ' ' . $line . '<br>';
    }
} else {
    // Display the single-line joke
    echo $jokeData['joke'];
}
?>

        </div>
        <!-- MotivateMe section -->
      <div class="bg-gray-100 p-4 rounded-lg mt-8">
          <h2 class="text-xl font-semibold">MotivateMe (Inspire yourself every moment)</h2>
        <br>
          <?php
// Fetch a random motivational quote from the zenquotes.io API
$quoteData = file_get_contents('https://zenquotes.io/api/random');
$quoteData = json_decode($quoteData, true);

// Display the motivational quote
echo '<p class="">' . $quoteData[0]['q'] . '</p>';
echo '<p class="">' . $quoteData[0]['a'] . '</p>';
?>

      </div>


      <!-- CodingJumpper section -->
<div class="bg-gray-100 p-4 rounded-lg mt-8">
    <h2 class="text-xl font-semibold">CodingJumpper (Random Coding Contest)</h2>
  <br>
  <div class='text-left'>
    <?php
// Fetch the list of coding contests from Codeforces API
$contestData = file_get_contents('https://codeforces.com/api/contest.list?gym=true');
$contestData = json_decode($contestData, true);

if ($contestData !== null && isset($contestData['result'])) {
    // Filter out only CODING phase contests
    $codingContests = array_filter($contestData['result'], function ($contest) {
        return $contest['phase'] === 'CODING';
    });

    if (!empty($codingContests)) {
        // Select a random coding contest from the filtered list
        $randomContest = $codingContests[array_rand($codingContests)];

        // Display the selected coding contest information line by line
        echo '<h3 class="text-lg font-medium mt-2">' . $randomContest['name'] . '</h3>';
        echo '<p class="text-gray-600"><b>Type:</b> ' . $randomContest['type'] . '</p>';
        echo '<p class="text-gray-600"><b>Start Time:</b> ' . date('Y-m-d H:i:s', $randomContest['startTimeSeconds']) . '</p>';
        echo '<p class="text-gray-600"><b>Prepared By:</b> ' . $randomContest['preparedBy'] . '</p>';

        // Check if the description contains any links
        $description = $randomContest['description'];
        if (preg_match('/(https?:\/\/[^\s]+)/', $description, $matches)) {
            $description = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $description);
        }

        echo '<p class="text-gray-600"><Description: </b>' . $description . '</p>';
    } else {
        echo '<p class="text-gray-600">No coding contests found.</p>';
    }
} else {
    echo '<p class="text-gray-600">Unable to fetch coding contests at the moment. Please try again later.</p>';
}
?>

</div>
</div>

      
    </div>
</header>
  



  <!-- Subscription section -->
<section class="bg-gray-200 py-8">
    <div class="container mx-auto text-center">
        <h2 class="text-2xl font-semibold text-gray-700">SUBSCRIBE</h2>
        <p class="text-gray-500">Subscribe to receive the latest memes, motivational quotes, and programming problems in your email.</p>
        <form class="mt-4 flex flex-col items-center">
            <input type="text" placeholder="Your Name" class="w-64 py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400" required>
            <input type="email" placeholder="Your Email" class="w-64 mt-2 py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400" required>
            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-400">Subscribe</button>
        </form>
    </div>
</section>

  
<!-- Footer section -->
<footer class="bg-blue-500 py-4">
    <nav class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="index.php" class="text-white text-2xl font-bold">RDN</a>
        <ul class="flex space-x-4">
            <li><a href="https://roydigitalnexus.com/tools" class="text-white hover:text-blue-200">Home</a></li>
            <li><a href="contact.php" class="text-white hover:text-blue-200">Contact</a></li>
            <li><a href="privacy.php" class="text-white hover:text-blue-200">Privacy</a></li>
            <li><a href="terms.php" class="text-white hover:text-blue-200">Terms</a></li>
        </ul>
    </nav>
</footer>

</body>
</html>