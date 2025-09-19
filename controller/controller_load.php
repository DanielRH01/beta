<?php
include("../model/connect.php");

$colums = [
    'us_id',
    'us_first_name',
    'us_last_name',
    'us_dni',
    'us_email',
    'us_date'
    ];

$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';

$where = '';
    if($search != null){
        $where = "WHERE (";

        $cont = count($colums);
        for($i=0; $i<$cont; $i++){
            $where .= $colums[$i] . " LIKE '%" . $search ."%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

$sql = "SELECT " . implode(", ", $colums) . " FROM persona $where";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
