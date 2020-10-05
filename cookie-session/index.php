<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    $name = $_POST["name"];
    $value = $_POST["value"];

    if ($action === "Add Cookie") {
        $timeout = time() + 60;
        // creating a new cookie
        setcookie($name, $value, $timeout);
    } else if ($action === "Add Session") {
        // creating a new session entry
        $_SESSION[$name] = $value;
    } else if ($action === "Clear All") {
        // destroying all cookies
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, false);
        }

        // destroying all sessions
        session_destroy();
    }
    header("Location: /");
}

$sessions = $_SESSION;
$cookies = $_COOKIE;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>State Management</title>
</head>

<body class="container">
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <h4>Add More ...</h4>
            <div>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                        <small id="nameHelp" class="form-text text-muted">The name (key) used as identifier.</small>
                    </div>
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" name="value" class="form-control" id="value" aria-describedby="valueHelp" placeholder="Enter Value">
                        <small id="valueHelp" class="form-text text-muted">The value you wish to store.</small>
                    </div>
                    <input type="submit" name="action" class="btn btn-primary" value="Add Cookie">
                    <input type="submit" name="action" class="btn btn-primary" value="Add Session">
                    <input type="submit" name="action" class="btn btn-success" value="Clear All">
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h4>Sessions</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counterSession = 1; ?>
                    <?php foreach ($sessions as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $counterSession++ ?></th>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Cookies</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counterCookie = 1; ?>
                    <?php foreach ($cookies as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $counterCookie++ ?></th>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>