<html>
<head>
    <title>ledger page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <?php include("connection.php"); ?>

        <h1> general ledger</h1>

             <?php $sql="SELECT DISTINCT account_type FROM record order by account_type"; $result = $conn->query($sql); if ($result->num_rows > 0)  {while($row = $result->fetch_assoc()){ $id = $row['account_type'];$sql2="SELECT account_name FROM accounts  WHERE account_id= $row[account_type]";$result2 = $conn->query($sql2);$account_name = $result2->fetch_assoc();?>
            <table border=2>
                <tr style="background-color:green">
                    <td> <?php echo $account_name['account_name'] ?> </td>
                    <td> <?php echo $id?> </td>
                </tr>

                <tr>
                    <td>date</td>
                    <td>explanation</td>
                    <td>ref</td>
                    <td>debit</td>
                    <td>credit</td>
                    <td>balance</td>
                </tr>

                    <?php  $sql2="SELECT * FROM record WHERE account_type=' $id ' "; $result2 = $conn->query($sql2); if ($result2->num_rows > 0)  { $balance = 0;$debit = 0;$credit=0; while($row2 = $result2->fetch_assoc()) { $debit +=$row2['debit'];$credit +=$row2['credit'];?>
                
                <tr>
                    <td > <?php echo $row2['date']?> </td>
                    <td > <?php echo $row2['description']?> </td>
                    <td > <?php echo $row2['account_type']?> </td>
                    <td > <?php echo $row2['debit']?> </td>
                    <td > <?php echo $row2['credit']?> </td>
                    <td > <?php $balance = $balance + $row2['debit'] - $row2['credit']; echo $balance?> </td>
                </tr>
                        
                        <?php } } ?>
                <tr style="color:red">
                    <td > total balance </td>
                    <td></td>
                    <td></td>
                    <td> <?php echo $debit?> </td>
                    <td> <?php echo $credit?> </td>
                    <td > <?php echo $balance?> </td>
                </tr>
        </table> </br>

    
                <?php  }  }   ?>
    </div>
</body>
</html>