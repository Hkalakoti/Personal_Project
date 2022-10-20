<?php session_start();

$name = $_SESSION['row'];
?>

<?php
require 'config.php';
?>

<html>

<body style="background-color:#fdfdfd;">

    <head>
        <h1 style="margin-left:44%; margin-right: 32%"> AJAX In PHP</h1>
    </head>
    <div class="container" style="margin-left: 35%; margin-right: 35%; margin-top: 100px; text-align: center;">
        <form action="result.php" method="POST" style="border-style: solid; padding: 20px; size:auto;" >
        <div class="ui-widget">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" onkeyup="showHint(this.value)" autocomplete="off"><br>
        </div>
            <!-- <p style="margin-right: 30%;">Suggestions: <span id="txtHint"></span></p>--><br> 
            <input type="submit" value="Submit">
        </form>
    </div>
</body>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            suggestion();
        }

        function suggestion() {

            var id = $('#name').val();
            var arr = <?php echo json_encode($name); ?>;
            arr = arr.filter(item=>item.toLowerCase().includes(id.toLowerCase()))

            $( "#name" ).autocomplete({
                      source: arr
    });
            document.getElementById("txtHint").innerHTML = arr;
        }
    }

</script>
</html>