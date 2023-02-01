<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
    <title>State Capitals</title>
  </head>
<body>
<h3>Civics Quiz</h3>
<?php
$displayForm = true;
$correctAnswers = 0;
$stateCapitals = array("Connecticut" => "Hartford", "Maine" => "Augusta");

function displayResults(array $stateCapitals): void
{
    global $correctAnswers;
    $answersArray = array(
            "Connecticut" => $_POST['Connecticut'],
            "Maine" => $_POST['Maine']
    );

    foreach($answersArray as $state => $response) {
           if(strlen($response) > 0) {
               if(strcasecmp($response, $stateCapitals[$state]) == 0) {
                   $correctAnswers++;
                   echo "<p>Correct! The capital of {$state} is {$response}.</p>";
               } else {
                   echo "<p>Incorrect! The capital of {$state} is {$stateCapitals[$state]}.</p>";
               }
           }else{
                echo "<p>You did not enter a response for {$state}.</p>";
           }

    }


}

function displayStats(array $stateCapitals): void
{
    global $correctAnswers;
    $totalQuestions = count($stateCapitals);
    $percentCorrect = ($correctAnswers / $totalQuestions) * 100;

    echo "<p>You answered {$correctAnswers} out of {$totalQuestions} questions correctly.</p>";
    echo "<p>Your score is {$percentCorrect}%.</p>";
    if($percentCorrect == 100){
        echo "<h1>You are a good citizen!</h1>";
    }

}

if(isset($_POST['send'])) {
    displayResults($stateCapitals);
    displayStats($stateCapitals);

}





//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ($displayForm) {
?>
      <form action="StateCapitalsStartup.php" method="post">
      
      <table border="0">
      <tr>
      	<td>The capital of Connecticut is: </td>
      	<td><input type="text" name="Connecticut" size = "25" /></td>
      </tr> 
      <tr>
      	<td>The capital of Maine is: </td>
      	<td><input type="text" name="Maine" size = "25"/></td>
      </tr>  
	  <tr></tr>	  
      <tr>
      	<td><input type="submit" name="send" id="submit" value="Check Answers" />&nbsp;&nbsp;&nbsp;
      	<input type="reset" name="resetButton" id="resetButton" value="Clear Form" /></td>
      </tr>				
      </table>
        
      </form>
<?php
}
?>
<footer>
    <script src="JS/capitals.js"></script>
</footer>
</body>
</html>

