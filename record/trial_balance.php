<?php
include("connection.php");
?>
<h1>trial balance </h1>
<table border=2>
    <tr>
        <td>account type</td>
        <td>Debit</td>
        <td>Credit</td>
    </tr>
    
    <?php 
$sql="SELECT DISTINCT account_type FROM record ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    $total_debit = 0;
    $total_credit = 0;
    while($row = $result->fetch_assoc())
    {
        $id = $row['account_type'];
        $name = "";
        $sql2="SELECT * FROM record cross join accounts  on account_type=account_id where account_id='$id' ";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) 
        {
                $balance = 0;
                $debit = 0;
                $credit=0;
            while($row2 = $result2->fetch_assoc())
            {
                $debit +=$row2['debit'];
                $credit +=$row2['credit'];
                $balance = $balance + $row2['debit'] - $row2['credit'];
                $name = $row2['account_name'];
            }
            ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php if($balance >0){echo $balance; $total_debit +=$balance;}?></td>
                <td><?php if($balance <0){echo $balance;  $total_credit +=$balance;}?></td>
            </tr>
            <?php

    }
}
?>
<tr style="background-color:red;">
    <td>total</td>
    <td><?php echo $total_debit?></td>
    <td><?php echo $total_credit?></td>
</tr>
<?php
}
?>

</table>
<?php
?>