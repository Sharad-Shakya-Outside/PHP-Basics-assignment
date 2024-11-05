<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "gradedb";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "Could not connect!";
}

if ($conn) {
    $sql = "SELECT * FROM student";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $students = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $students[] = $row;
        }

        print_r($students[0]);
        echo "<br>";
        print_r($students[1]);
        echo "<br>";
        print_r($students[2]);
        echo "<br>";
        print_r($students[3]);
        echo "<br>";

        function isAssociativeArray(array $array) {
            return count(array_filter(array_keys($array), 'is_string')) > 0;
        }

        function isMultidimensional(array $array) {
            foreach ($array as $student) {
                if (is_array($student)) {
                    return 1;
                }
            }
        }

        if (empty($students)) {
            echo "The array is empty. <br>";
        }
        
        if (isAssociativeArray($students)) {
            echo "The array is associative array. <br>";
        } else {
            echo "The array is not associative array. <br>";
        }

        if (isMultidimensional($students)) {
            echo "The array is multidimensional array <br>";
        } else {
            echo "The array is not multidimensional array <br>";
        }
    } else {
        echo "Query failed!";
    }

    mysqli_close(($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <th>
            <td>Name</td>
            <td>Math grade</td>
            <td>Science grade</td>
            <td>English grade</td>
        </th>
        <tr>
            <td>A<?php echo "$students[0]->$name[0]"; ?></td>
            <td>A<?php echo "$students[0]->$name[0]"; ?></td>
            <td>A<?php echo "$students[0]->$name[0]"; ?></td>
            <td>A<?php echo "$students[0]->$name[0]"; ?></td>
        </tr>
    </table>
</body>

</html>