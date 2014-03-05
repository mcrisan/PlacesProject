<?php

if (!$_REQUEST['term']) {
    exit();
}

//$stars = ($_REQUEST['rating']);
$input = ($_REQUEST['term']);


$conn = mysql_connect("localhost", "root", "root");
$db = mysql_select_db("placesdb");

//if ($stars != "") {
//    $sql = "
//SELECT place_name, place_vicinity, place_rating FROM place_details where place_name like '%" . $input . "%'
//    and place_rating >= '".$stars."'"
//    ;
//} else {

$sql = "
SELECT place_name, place_vicinity, place_rating FROM place_details where place_name like '%" . $input . "%'";
;

mysql_query("SET NAMES utf8");
$result = mysql_query($sql);
$data = array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

    $rating = "rating not avaiable";
    if (!empty($row['place_rating'])) {
        $rating = $row['place_rating'];
    }
    $label = $row['place_name'];// ." : " . $rating;
//    $label .= ", ";
//    $label .= $row['place_vicinity'];

    $value = $row['place_name'];

    $data[] = array(
        'label' => $label,
        'value' => $value
    );
}
echo json_encode($data);
flush();
?>
