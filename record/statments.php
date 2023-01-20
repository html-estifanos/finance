<html>
<head>
    <title>journal page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
<h1>income statment</h1><table border=2>
<?php
include("connection.php");
$capital = 0;
$sql1 = "SELECT * from `record` CROSS join `accounts` ON `record`.`account_type`=`accounts`.`account_id` where `accounts`.`account_class`='revenue'";
$sql2 = "SELECT * from `record` CROSS join `accounts` ON `record`.`account_type`=`accounts`.`account_id` where `accounts`.`account_class`='expenses'";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
?><td style="background-color:green"><b>revenue</b></td><?php
$total_debit=0;
$total_credit=0;
while($row=$result1->fetch_assoc())
{
    ?>
    <tr>
    <td><?php echo $row["account_name"]?></td>
    <td><?php echo $row["debit"];$total_debit += $row["debit"]?></td>
    <td><?php echo $row["credit"];$total_credit += $row["credit"]?></td>
    </tr>
    <?php
}
?><td style="background-color:green"><b>expense</b></td><?php
while($row=$result2->fetch_assoc())
{
    ?>
    <tr>
    <td><?php echo $row["account_name"]?></td>
    <td><?php echo $row["debit"];$total_debit += $row["debit"]?></td>
    <td><?php echo $row["credit"];$total_credit += $row["credit"]?></td>
    </tr>
    <?php
}
?>
<tr>
    <td>total</td>
    <td><?php echo $total_debit?></td>
    <td><?php echo $total_credit?></td>
</tr>
<tr style="color:red">
    <td>net income</td>
    <td><?php echo $net = $total_credit - $total_debit?></td>
</tr>
</table>





<h1 >owners equity statment</h1>
<table border=2>
    <?php 
$sql1 = "SELECT * from `record` CROSS join `accounts` ON `record`.`account_type`=`accounts`.`account_id` where `accounts`.`account_name`='owners capital'";
$sql2 = "SELECT * from `record` CROSS join `accounts` ON `record`.`account_type`=`accounts`.`account_id` where `accounts`.`account_name`='owners drawing'";
$result2 = $conn->query($sql2);
$result1 = $conn->query($sql1);
?><td style="background-color:green"><b>owner capital</b></td><?php
$total_o_debit=0;
$total_o_credit=0;
while($row=$result1->fetch_assoc())
{
    ?>
    <tr>
    <td><?php echo $row["account_name"]?></td>
    <td><?php echo $row["debit"];$total_o_debit += $row["debit"]?></td>
    <td><?php echo $row["credit"];$total_o_credit += $row["credit"]?></td>
    </tr>
    <?php
}
?>
<tr>
    <td>net income<td>
        <td><?php echo $net?></td>
</tr>
<td style="background-color:green"><b>owner drawing</b></td><?php
$total_debit=0;
$total_credit=0;
while($row=$result2->fetch_assoc())
{
    ?>
    <tr>
    <td><?php echo $row["account_name"]?></td>
    <td><?php echo $row["debit"];$total_debit += $row["debit"]?></td>
    <td><?php echo $row["credit"];$total_credit += $row["credit"]?></td>
    </tr>
    <?php
}
?>
<tr style="color:red">
    <td>present owners capital</td>
    <td><?php echo $capital = $total_o_credit - $total_o_debit +$net -$total_debit +$total_credit?></td>
</tr>
</table>




<h1>balance sheet statment</h1>
<table border=2>
    <tr style="background-color:green"><td>assets</td></tr>
   <?php
 $sql2="SELECT DISTINCT account_type,account_name FROM record cross join accounts  on account_type=account_id where account_class='asset' ";
 
 $result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) 
 {
             $g_balance = 0;
         
     while($row2 = $result2->fetch_assoc())
     {
        
        $sql = "SELECT * FROM record WHERE account_type = $row2[account_type]";
             $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                $balance = 0;
                $debit = 0;
                $credit=0;  
                while($row = $result->fetch_assoc())
                {
                    $debit = $row["debit"];
                    $credit = $row["credit"];
                    $balance += $debit - $credit;
                }
                ?>
                <tr>
                    <td>total <?php echo $row2["account_name"]?></td>
                    <td><?php echo $balance ?></td></tr>
                        <?php
            }
           $g_balance +=$balance;

     }
     ?>
     <tr style="color:red"><td>grand total </td><td><?php echo $g_balance; ?></td></tr>
     <?php
   
    }

?>
<tr style="background-color:green"><td>liabilities and equities</td></tr>
   <?php
 $sql2="SELECT DISTINCT account_type,account_name FROM record cross join accounts  on account_type=account_id where account_class='liability' ";
 
 $result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) 
 {
             $g_balance = 0;
         
     while($row2 = $result2->fetch_assoc())
     {
        
        $sql = "SELECT * FROM record WHERE account_type = $row2[account_type]";
             $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                $balance = 0;
                $debit = 0;
                $credit=0;  
                while($row = $result->fetch_assoc())
                {
                    $debit = $row["debit"];
                    $credit = $row["credit"];
                    $balance += $debit - $credit;
                }
                ?>
                <tr>
                    <td>total <?php echo $row2["account_name"]?></td>
                    <td><?php echo $balance ?></td></tr>
                        <?php
            }
           $g_balance +=$balance;

     }
     ?>
     <tr><td>owners capital</td><td><?php echo $capital ?></td></tr>
     <tr style="color:red"><td>grand total </td><td><?php echo $g_balance - $capital; ?></td></tr>
     <?php
   
    }

?>
</table>
<div>
    </html>