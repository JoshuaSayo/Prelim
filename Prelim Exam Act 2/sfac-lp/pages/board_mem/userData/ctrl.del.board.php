<?php
require '../../../includes/conn.php';
session_start();

$get_id = $_GET['board_id'];

mysqli_query($db, "DELETE FROM tbl_board WHERE board_id = '$get_id' ") or die(mysqli_error($db));
$_SESSION['successDel'] = true;
header("location: ../list.board.php");