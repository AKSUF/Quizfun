<style>
    /* Add your custom CSS styles here */
    .mcq-container {
        display: flex;
        flex-direction: column;
    }

    .mcq-question {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .mcq-question:hover {
        background-color: #f0f0f0;
    }

    .mcq-options span {
        display: block;
        margin-bottom: 5px;
    }

    #result {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-top: 20px;
    }

    /* Style the score div */
    #score {
        font-size: 16px;
        margin-top: 10px;
    }
</style>



<?php
include('./Common/Connection.php');
if (isset($_GET['mcq'])) {
    $fileId = $_GET['mcq'];
    $query = "SELECT * FROM file WHERE `fileId`='$fileId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $file = mysqli_fetch_assoc($result);
        $fileName = $file['fileName']; // Get the file name from the database
      
        // Construct the file path
        $filePath = "./FilePath/" . $fileName;
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Read the file contents
            $fileContents = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Initialize an array to store MCQ data
            $mcqData = array();
        // Initialize a counter for the number of questions
$questionCount = 0;

// Parse the CSV data into an associative array
foreach ($fileContents as $index => $line) {
    if ($index === 0) {
        // The first line contains headers, skip it
        continue;
    }

    $fields = str_getcsv($line);
    if (count($fields) === 7) {
        // Ensure there are 7 fields in each row
        $mcqData[] = array(
            "No." => $fields[0],
            "MCQ" => $fields[1],
            "Answer" => $fields[2],
            "A" => $fields[3],
            "B" => $fields[4],
            "C" => $fields[5],
            "D" => $fields[6],
        );

        // Increment the question count
        $questionCount++;
    }
}

// Display the total number of questions
echo '<div id="total-questions" class="d-none">Total Questions: ' . $questionCount . '</div>';



            // Initialize the score
            $score = 0;

            // Display MCQ questions
            echo '<div class="mcq-container">';
            foreach ($mcqData as $mcq) {
                $question = $mcq["MCQ"];
                $options = array("A" => $mcq["A"], "B" => $mcq["B"], "C" => $mcq["C"], "D" => $mcq["D"]);
                $answer = $mcq["Answer"];

                echo '<div class="mcq-question-container">';
                echo '<div class="mcq-question" data-correct-answer="' . $answer . '">';
                echo "<h3>Question " . $mcq["No."] . ": $question</h3>";
                echo '<ul class="mcq-options">';
                foreach ($options as $optionKey => $optionValue) {
                    if (!empty($optionValue)) {
                        echo "<span><input type='radio' name='q{$mcq["No."]}'
                              data-correct-answer='{$mcq["Answer"]}' value='{$optionKey}'>{$optionKey}. {$optionValue}</span><br/>";
                    }
                }
                echo "<button class='submit-btn' data-question-no='{$mcq["No."]}'>Submit</button>";
                echo '</ul>';
                echo "<p>Correct Answer: $answer</p>";
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '<div>';

            // Close the database connection if needed
            mysqli_close($conn);
        } else {
            // Handle the case where the file doesn't exist
            echo 'File not found';
        }
    } else {
        // Handle the case where no data is found
        echo 'No data found';
    }
} else {
    // Handle cases where 'mcq' is not provided in the URL
    echo 'FileId not provided';
}

?>

<div id="result"></div>

<div id="score">Score: 0/0 (0%)</div>
