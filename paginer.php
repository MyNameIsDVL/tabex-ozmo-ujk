<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "gpro");
$results_per_page = 4;

$sql = "SELECT * from tbl_product LIMIT 0,5";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
}
else {
    $page= $_GET['page'];
}
$this_page_first_result = ($page-1) * $results_per_page;

$sql = "SELECT * from tbl_product LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo $row['id'] . '' . $row['name'] . '<br>';
}

for ($page=1;$page<=$number_of_pages;$page++)
{
    echo '<a href="paginer.php?page=' . $page . '">' . $page . '</a>';
}
?>

</body>
</html>