<!DOCTYPE html>

<html>
    <head>
        <title>Search artist by surname</title>
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
    $surname = $_POST["artistsurname"];

    $conn = new mysqli("localhost","root","root","gallery");
    $query = "SELECT * FROM author WHERE author.Surname = '" . $surname . "';";

    echo "<h1>Art Gallery</h1><br>";
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);
        if($result->num_rows > 0){
            echo $result->num_rows . " results found.";
        while($row = $result->fetch_assoc()){
            echo "<h5>Name: </h5><br>";
            print_r($row["Name"]);
            
            echo "<br><br><h5>Surname: </h5><br>";
            print_r($row["Surname"]);
            echo "<br><br><h5>Birth Year: </h5>";
            print_r($row["BirthYear"]);
            echo "<br><br><h5>Birth Place: </h5>";
            print_r($row["BirthPlace"]);
            echo "<br><br><h5>Biography:</h5>";
            print_r($row["Biography"]);
            echo "<br><br>";
            echo "-----------------------------------------------------------------------------------------------------------------------";
            }
        }
        else{
            echo "0 results find.";
        }
    

    $conn->close();
    ?>
    </body>

</html>