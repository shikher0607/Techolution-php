<!DOCTYPE html>
<html>
<head>
	<title>Student Result</title>
	<meta charset="UTF-8"> 
    <link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
<table>
      	<thead>
        <tr>
        	<th>Student Results Board</th>
        </tr></thead>
        <thead id="subheadings">
        <tr>
        	<td>Student Name</td>
        	<td>Roll Number</td>
        	<td>Total Marks</td>
        	<td>Status</td>
        </tr>
        </thead>
        <?php
$totalMarks = array();        
$url = "./student.json";
$data = file_get_contents($url);
$dataArray = json_decode($data, true);
sort($dataArray);
foreach ($dataArray as $dataArrays) {
$name = $dataArrays['name'];
$rollNumber = $dataArrays['rollNumber'];
$marks = $dataArrays['marks'];
foreach ($marks as $subMarks) {
	$english = $subMarks['english'];
	$maths = $subMarks['maths'];
	$science = $subMarks['science'];
	$total = $english + $maths + $science;
	if ($english < 20 || $maths < 20 || $science < 20) {
		$status = 'fail';
	}else{
		$status = 'pass';
	}
	?>
	<tr>
		<td class="<?php echo $status; ?>"><?php echo ucwords($name); ?></td>
		<td class="<?php echo $status; ?>" ><?php echo $rollNumber; ?></td>
		<td class="<?php echo $status; ?>"><?php echo $total; ?></td>
		<td class="<?php echo $status; ?>"><?php echo ucwords($status); ?></td>
	</tr>
<?php }
}
?>
      </table>
</body>
</html>
