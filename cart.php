<?php
session_start();
require_once "config/database.php";
include "includes/header.php";

$total = 0;

if (empty($_SESSION['cart'])) {
    echo "<h3>Giỏ hàng đang trống!</h3>";
    include "includes/footer.php";
    exit;
}
?>

<h2>Giỏ hàng</h2>

<table class="table table-bordered">

<tr>
    <th>Tên món</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Xóa</th>
    <td>

<a
class="btn btn-warning"

href="update_cart.php?id=<?= $id ?>&action=delete">

Xóa

</a>

</td>
</tr>

<?php

foreach ($_SESSION['cart'] as $id => $qty) {

    $sql = "SELECT * FROM mon_an WHERE ma_mon=$id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $thanhtien = $row['gia'] * $qty;

    $total += $thanhtien;

?>

<tr>

<td><?= $row['ten_mon'] ?></td>

<td><?= number_format($row['gia']) ?> VNĐ</td>

<td>

<a class="btn btn-sm btn-danger"
href="update_cart.php?id=<?= $id ?>&action=minus">

-

</a>

<b style="margin:0 10px">

<?= $qty ?>

</b>

<a class="btn btn-sm btn-success"
href="update_cart.php?id=<?= $id ?>&action=plus">

+

</a>

</td>

<td><?= number_format($thanhtien) ?> VNĐ</td>

</tr>

<?php } ?>

<tr>

<td colspan="3"><b>Tổng tiền</b></td>

<td>

<b><?= number_format($total) ?> VNĐ</b>

</td>

</tr>

</table>

<a href="menu.php" class="btn btn-primary">

Tiếp tục chọn món

</a>

<a href="confirm.php" class="btn btn-success">

Đặt món

</a>

<?php include "includes/footer.php"; ?>