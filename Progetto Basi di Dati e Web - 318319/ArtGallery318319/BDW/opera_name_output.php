<!DOCTYPE html>

<html>
    <head>
        <title>Search opera by title</title>
        <style>
           img{
                float: right;
                width: 10cm;
                height: 10cm;
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
    $title = $_POST["OperaName"];

    $conn = new mysqli("localhost","root","root","gallery");
    $query = "SELECT opera.Title, author.Name, author.Surname, opera.image, opera.Year, opera.Description FROM author INNER JOIN opera ON author.idAuthor = opera.codAuthor WHERE opera.Title = '" . $title . "';";
    
    echo "<h1>Art Gallery</h1><br>";
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);
        if($result->num_rows > 0){
            echo $result->num_rows . " results found.";
        while($row = $result->fetch_assoc()){
            echo "<br><br><h5>Image: </h5>" . '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/><br />';
            echo "<h5>Opera Title:</h5>
                " . $row["Title"] .
                "<br><br><h5>Opera Author: </h5><br>" .
                $row["Name"] . " " . $row["Surname"] .
                "<br><br><h5>Year: </h5>" . 
                $row["Year"] .
                "<br><br><h5>Opera Description: </h5><br>" .
                $row["Description"] . "<br><br>" .
                "-----------------------------------------------------------------------------------------------------------------------";
        }
        }
        else{
            echo "0 results";
        }

    $conn->close();
    ?>

    </body>

</html>