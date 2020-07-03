<!DOCTYPE html>
<html>
    <head>
    </head>
    <body
    <?php
        $bg = "";
        if (isset($_REQUEST['bg'])) {
            $bg = $_REQUEST['bg'];
            setcookie("bg", $_REQUEST['bg'], 0, '/');
        } else  if (isset($_COOKIE['bg'])) {
            $bg = $_COOKIE['bg'];
        }
        if ($bg != "") {
            echo "style='background: $bg'";
        } else {
            echo "style='color: blue;'";
        }

    ?>
    >
        Today is <?php echo todaysDate(); ?>
        <form method="POST" enctype="multipart/form-data" action="/addTask.php">
            Task name: <input type="text" name="task" />
            <input type="submit" value="Input Sumit" />
            <button>Submit</button>
        </form>
        <hr/>
        <h1>Tasks</h1>
        <ul>
            <?php
                include("db_connection.php");
                $stmt = $pdo->query("select id, name from tasks");
                while ($row = $stmt->fetch())
                {
                    echo "<li id='task_" . $row['id'] . "'>" . $row['name'] . "</li>";
                }
                // $stmt->free();
            ?>
        </ul>
    </body>
</html>
<?php
function todaysDate() {
    return date(DateTimeInterface::COOKIE);
}
?>