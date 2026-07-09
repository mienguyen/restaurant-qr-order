<?php
require_once "config/database.php";
include "includes/header.php";

$sql = "SELECT * FROM mon_an";
$result = $conn->query($sql);
?>

<h2 class="mb-4">Menu Nhà Hàng</h2>

<div class="row">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="col-md-4">

<div class="card mb-4 shadow">

<div class="card-body">

<h4><?= $row['ten_mon'] ?></h4>

<p>

<?= $row['mo_ta'] ?>

</p>

<h5 class="text-danger">

<?= number_format($row['gia']) ?> VNĐ

</h5>

<a href="#" class="btn btn-success">

Thêm vào giỏ

</a>

</div>

</div>

</div>

<?php } ?>

</div>

<?php include "includes/footer.php"; ?>