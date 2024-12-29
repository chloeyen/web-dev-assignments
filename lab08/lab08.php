<?php
function getResult()  {
    $hour = date('H'); 
    if ($hour >= 6 && $hour < 12) {                 
        return ['Good morning', 'morning' ];
    } elseif ($hour >=12 && $hour < 18) {           
        return ['Good afternoon', 'afternoon'];
    } elseif ($hour >= 18 && $hour < 21) {          
        return ['Good evening', 'evening'];
    } else {
        return ['Good night', 'night'];
    }
}

$result = getResult();
$greeting = $result[0];
$class = $result[1];

include("favourite-image.php"); //php file for problem 3
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Web Page lab08</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tableForm").on('submit', function(event){
                event.preventDefault();
                const data = $(this).serialize();
                $.post("multi-table.php", data, function(response) {
                    const parsedResponse = JSON.parse(response);
                    if (!parsedResponse.success) {
                        $("#error").html(parsedResponse.message);
                        $("#table").html(''); 
                        setTimeout(function() {
                            window.location.href = "lab08.php";  // If input invalid, redirect after 3 seconds
                        }, 3000);
                    } else {
                        $("#table").html(parsedResponse.table); 
                    }
                });
            });
        });
    </script>
    <style>
        .morning {
            border: dashed 5px  #0096FF;
            width: 100%;
            height: 10vw;
            background-image: url(texture-images/morning.gif);
            background-repeat: repeat;
            display: flex; 
            justify-content: center;
            align-items: center;
            color: #0096FF	;
            font-size: 8vw;
        }
        .afternoon {
            border: dashed 5px green;
            width: 100%;
            height: 10vw;
            background-image: url(texture-images/afternoon.gif);
            background-repeat: repeat;
            display: flex; 
            justify-content: center;
            align-items: center;
            color: green;
            font-size: 8vw;
        }
        .evening {
            border: dashed 5px #F89880;
            width: 100%;
            height: 10vw;
            background-image: url(texture-images/evening.gif);
            background-repeat: repeat;
            display: flex; 
            justify-content: center;
            align-items: center;
            color: #F89880;
            font-size: 8vw;
        }
        .night {
            border: dashed 5px #87CEEB;
            width: 100%;
            height: 10vw;
            background-image: url(texture-images/night.gif);
            background-repeat: repeat;
            display: flex; 
            justify-content: center;
            align-items: center;
            color: #87CEEB;
            font-size: 8vw;
        }
        form {
            background-color: antiquewhite;
            padding: 5px 10px;
        }

        #error {
            font-size: 20px; 
            color: red;
        }

        table {
            border: 1px solid black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: lightblue;
            text-align: right;
            border-collapse: collapse;
            table-layout: fixed;
        }
        td,tr,th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0px 10px;
        }
    </style>
</head>

<body>
    <!-- Problem 1 -->
    <div class="<?php echo $class; ?>"> 
        <?php echo "<p>$greeting</p>"; ?>
    </div>

    <br><br>

    <!-- Problem 2 -->
    <div>
        <h2>Multiplication Table Generator</h2>
        <form id="tableForm" method="post">
            <h3>Input 2 integer numbers (must be between 3 and 12)</h3>
            <label for="row">1st number:</label>
            <input type="text" id="row" name="row" placeholder="Enter first number" required><br><br>

            <label for="col">2nd number:</label>
            <input type="text" id="col" name="col" placeholder="Enter second number" required><br><br>
            
            <input type="submit" value="Generate Table">
        </form>
    </div>

    <h2>Result</h2>
    <span id="error"></span>
    <div id="table"></div>
    
    <br>

    <!-- Problem 3 -->
    <div>
        <h2>Choose your favourite image</h2>
        <form method="post">    
            <label>
                <input type="radio" name="favouriteImage" value="turkey2.gif">
                <img src="thanksgiving-images/turkey2.gif" alt="turkey">
            </label><br>

            <label>
                <input type="radio" name="favouriteImage" value="thanks3.gif">
                <img src="thanksgiving-images/thanks3.gif" alt="thanksgiving">
            </label><br>

            <label>
                <input type="radio" name="favouriteImage" value="tday.gif">
                <img src="thanksgiving-images/tday.gif" alt="turkey day">
            </label><br>

            <label>
                <input type="radio" name="favouriteImage" value="pilgrim2.gif">
                <img src="thanksgiving-images/pilgrim2.gif" alt="pilgrim">
            </label><br>

            <label>
                <input type="radio" name="favouriteImage" value="mealprep.gif">
                <img src="thanksgiving-images/mealprep.gif" alt="mealprep">
            </label><br><br><br>
            <input style="padding: 3px 13px; margin-left: 20px;" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>


