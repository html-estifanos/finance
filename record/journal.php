<?php
include("connection.php");

?>
 <html>
<head>
    <title>journal page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
<table border=2>
    <tr>
        <th> Genaral journal entries</th>
    </tr>
    <tr>
        <td>Data</td>
        <td>Account Titles And Explanation</td>
        <td>Ref.</td>
        <td>Debit</td>
        <td>Credit</td>
    </tr>
  
    <?php
$sql="SELECT * FROM record";
$result = $conn->query($sql);
                   
if ($result->num_rows > 0) 
{
 while($row = $result->fetch_assoc())
 {
     
    $sql2="SELECT account_name FROM accounts  WHERE account_id= $row[account_type]";
    $result2 = $conn->query($sql2);
    $account_name = $result2->fetch_assoc();
?>
<tr>
  <td > <?php echo $row['date']?> </td>
  <td > <?php echo $account_name['account_name']?> </td>
  <td > <?php echo $row['account_type']?> </td>
  <td > <?php echo $row['debit']?> </td>
  <td > <?php echo $row['credit']?> </td>
  </tr>
  <?php

 }}?>

    
</table>
</div>
</html>
<?php


?>