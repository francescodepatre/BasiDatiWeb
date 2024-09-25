<!DOCTYPE html>

<html>
    <head>
        <title>Search shows by title</title>
        <style>
            img{
                float: left;
            }
            p{
                font-family: 'Times New Roman';
                color: dimgray;
                font-style: italic;
            }
            body{
                background-color: antiquewhite;
            }

            h1{
                text-align: center;
                font-style: italic;
            }

            h5{
                font-style: italic;
            }
        
        </style>
    </head>

    <body>
    <?php
    $title = $_POST["showtitle"];

    $conn = new mysqli("localhost","root","root","gallery");
    $query = "SELECT artshow.Title, artshow.Type, artshow.Description, artshow.DateAndTimeStart artshow.DateAndTimeEnd FROM artshow WHERE artshow.Title = '" . $title . "';";
    
    echo "<h1>Art Gallery</h1><br>";
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);
        if($result->num_rows > 0){
            echo $result->num_rows . " results found.";
        while($row = $result->fetch_assoc()){
            echo "<h5>Title: </h5><br>";
            print_r($row["Title"]);
            
            echo "<br><br><h5>Type: </h5><br>";
            print_r($row["Type"]);
            echo "<br><br><h5>Description: </h5>";
            print_r($row["Description"]);
            echo "<br><br><h5>DateAndTime Start: </h5>";
            print_r($row["DateAndTimeStart"]);
            echo "<br><br><h5>DateAndTime End: </h5>";
            print_r($row["DateAndTimeEnd"]);
            echo "<br><br>";
            echo "-----------------------------------------------------------------------------------------------------------------------";
            }
        }
        else{
            echo "0 results";
        }

    $conn->close();
    ?>
    </body>

</html>