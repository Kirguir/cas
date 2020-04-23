<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account page</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <?php if (!$user) { ?>
                <li>
                    <a href="/login">Login</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="/checks">Checks</a>
                </li>
                <li>
                    <a href="/checks/load">Load checks</a>
                </li>
                <li>
                    <a href="/report">Report</a>
                </li>
                <li>
                    <a href="/logout">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<?php if ($alert) {
    echo "<div class='alert alert-danger' role='alert'>{$alert}</div>";
} ?>
<?php include $template . '.php' ?>
</body>
</html>
