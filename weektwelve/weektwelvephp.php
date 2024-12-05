<?php
$breeds = ["Maltipoo", "Labrador Retriever", "German Shepherd", "Poodle", "Bulldog", "Golden Retriever"];

if (isset($_POST['input1']) && !empty($_POST['input1'])) {
  $userInput = $_POST['input1'];
  $found = false;

  foreach ($breeds as $breed) {
    if (strpos(strtolower($breed), strtolower($userInput)) !== false) {
      echo $breed;  
      $found = true;
      break;
    }
  }

  if (!$found) {
    echo "Dog breed not found.";
  }
}
?>