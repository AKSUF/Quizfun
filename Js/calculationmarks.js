$(document).ready(function() {
    var score = 0;
    var totalQuestions = $('.mcq-question').length;
    console.log(totalQuestions);
    var correctAnswers = getCorrectAnswers();
    var urlParams = new URLSearchParams(window.location.search);
    var mcqId = urlParams.get('mcq');
    var totalQuestionsCount = $('#total-questions').text();
    $('#total-questions').text(totalQuestionsCount + ' questions in total');
    // Add a change event listener to all radio buttons
    $('input[type="radio"]').on('change', function() {

        updateScore();
    });

    // Add a click event listener to the submit buttons
    $('.submit-btn').on('click', function() {
        var questionNo = $(this).data('question-no');

        var $question = $(`.mcq-question[data-question-no="${questionNo}"]`);

        var correctAnswer = correctAnswers[questionNo - 1];

        var selectedAnswer = $(`input[name="q${questionNo}"]:checked`).val();

        var selectedAnswers = $(`input[name="q${questionNo}"]:checked`);
        var selectedAnswerCount = selectedAnswers.length;

        // Increase the selectedAnswerCount by 1
        selectedAnswerCount++;

        console.log(selectedAnswerCount);

        if (selectedAnswer === correctAnswer) {
            score++;
        }

        if (selectedAnswerCount !== totalQuestionsCount) {
            var userId = localStorage.getItem('userId'); // Get userId from localStorage
            var participationDate = new Date().toISOString();

            sendScoreToServer(score, userId, mcqId, participationDate);
            console.log(totalQuestions);
            console.log(userId);
            console.log(participationDate);
        }



        // Hide the submit button after it's clicked to prevent multiple submissions
        $(this).prop('disabled', true);
        // Disable other radio buttons in the same question
        $(`input[name="q${questionNo}"]`).prop('disabled', true);

        // Show the correct answer text
        $(`#answer${questionNo}`).show();

        updateScore();
    });

    function updateScore() {
        var percentage = (score / totalQuestions) * 100;
        $('#score').text(`Score: ${score}/${totalQuestions} (${percentage.toFixed(2)}%)`);

        if (score === totalQuestionsCount) {
            // All questions answered, show the results
            $('#result').html('<p>Congratulations! You have completed the quiz.</p>');
        }
    }

    function getCorrectAnswers() {
        var correctAnswers = [];
        $('.mcq-question').each(function() {
            var correctAnswer = $(this).data('correct-answer');
            correctAnswers.push(correctAnswer);
        });
        return correctAnswers;
    }

    function sendScoreToServer(score, userId, mcqId, participationDate) {
        // Prepare the data to send as a JSON object
        var dataToSend = {
            userId: userId,
            mcq_id: mcqId,
            score: score,
            participation_date: participationDate
        };

        // Use AJAX to send the data to your PHP script
        $.ajax({
            type: 'POST',
            url: 'PhpFunction/postscore.php', // Replace with the actual URL of your PHP script
            data: dataToSend, // Send the JSON object as data
            dataType: 'json', // Specify the expected data type from the server
            success: function(response) {
                // Handle the response from the server, e.g., display a success message
                console.log('Score sent successfully:', response);
            },
            error: function(xhr, status, error) {
                // Handle any errors that occur during the AJAX request
                console.error('Error sending score:', error);
                console.log(xhr.responseText); // Log the detailed error response
            }
        });
    }



});