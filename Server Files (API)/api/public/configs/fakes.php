<?php

if (isset($_GET['signin'])) {
    $_POST['signin'] = "true";
    $_POST['studentID'] = "9702065134084";
    $_POST['googleID'] = "something";
}

if (isset($_GET['signout'])) {
    $_POST['signout'] = "true";
    $_POST['token'] = "rgjnj5v4l46bs7v0g2vlutk3nwpyg5gf";
}

if (isset($_GET['event'])) {
    $_POST['event'] = "true";
    $_POST['token'] = $_GET['token'];
}

if (isset($_GET['menuSettings'])) {
    $_POST['menuSettings'] = "true";
}