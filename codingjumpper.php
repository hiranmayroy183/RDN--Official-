<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Coding Jumpper - Get top 10 Random Programming Contests Daily</title>
  </head>
<body>

    <!-- Header section -->
    <header class="bg-blue-500 py-4">
        <?php include('header.php'); ?>
    </header>

    <!-- CodeBeat section -->
    <section class="bg-white py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-semibold">Coding Jumpper - Get top Programming Contests Daily</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">



              <?php
// Fetch the list of coding contests from Codeforces API
$apiUrl = 'https://codeforces.com/api/contest.list?gym=true';
$contestData = file_get_contents($apiUrl);
$contestData = json_decode($contestData, true);

if ($contestData !== null && isset($contestData['result'])) {
    // Filter out contests that are in the CODING phase
    $codingContests = array_filter($contestData['result'], function ($contest) {
        return $contest['phase'] === 'CODING';
    });

    // Collect all coding contests in an array
    $codingContestsArray = array_values($codingContests);
  // ...

  if (!empty($codingContestsArray)) {
      // Correct array slicing
      $first10Contests = array_slice($codingContestsArray, 0, 10);

      foreach ($first10Contests as $contest) {
          echo '<div class="bg-gray-100 p-4 rounded-md shadow-md mt-4">';
          echo '<h3 class="text-xl font-semibold">' . $contest['name'] . '</h3>';
          echo '<p class="text-gray-600">Type: ' . $contest['type'] . '</p>';
          echo '<p class="text-gray-600">Start Time: ' . date('Y-m-d H:i:s', $contest['startTimeSeconds']) . '</p>';

          // Check if description is available
          if (isset($contest['description'])) {
              // Display description with HTML escaping
              echo '<p class="text-gray-600">Description: ' . htmlspecialchars($contest['description']) . '</p>';
          }

          echo '</div>';
      }
  } else {
      echo '<p class="text-gray-600">No coding contests found in the CODING phase.</p>';
  }

  // ...

} else {
    echo '<p class="text-gray-600">Unable to fetch coding contests at the moment. Please try again later.</p>';
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
