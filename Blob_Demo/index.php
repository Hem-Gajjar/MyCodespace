<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Select File</td>
                <td><input type="file" name="f1"></td>
            </tr>
            <tr>
                <td>

                    <input type="submit" value="Upload" name="submit1">
                </td>
                <td>

                    <input type="submit" value="Display" name="submit2">
                </td>
            </tr>
        </table>
    </form>
    <?php
    $conn = mysqli_connect("localhost:3307","root","","test_blob1");
    // mysqli_select_db($conn,"test_blob1");
    if($conn)
    {
        echo "Success";
    }
    else
    {
        echo "Fail";
    }
    if(isset($_POST["submit1"]))
    {
        $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
        mysqli_query($conn,"insert into table1 values ('$image')");
    }
    if(isset($_POST["submit2"]))
    {
        $res = mysqli_query($conn,"select * from table1");
        echo "<table>";
        echo "<tr>";
        while($row = mysqli_fetch_array($res))
        {
            echo "<td>";
            echo '<img src="data:image/jpeg;base64,'. base64_encode($row['image1']).'" height="100" width="100"/>';
            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }

    ?>

</body>
</html>