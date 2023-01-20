<?php
include("connection.php");
// general form          
?>

<h3><u>general form</u></h3>
<form action="index.php" method="post">
    choose account : <select name="acc_type">
                   <?php
                   $sql="SELECT * FROM accounts  ORDER BY account_class ";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) 
                   {
                    while($row = $result->fetch_assoc())
                    {
                        
                    
                   ?>
                     <option value="<?php echo $row['account_id']?>"> <?php echo $row['account_name']?> </option>
                     <?php

                    }}?>
                    </select></br>
    value : <input type="number" name="value"></br>
    debit : <input type="radio" name="dc" id="dr" value="debit">
    credit : <input type="radio" name="dc" id="cr" value="credit">
</br>
    <input type="submit" value = "submit" name="add_transaction">
</form>
<?php

if(isset($_POST["add_transaction"]))
{
   if($_POST["dc"]=="debit")
   {
       $debit = $_POST["value"];
       $credit=0;
   }
   if($_POST["dc"]=="credit")
   {
       $credit = $_POST["value"];
       $debit=0;
   }
   $sql = "INSERT INTO `record`( `date`, `account_type`, `description`, `debit`, `credit`, `balance`) 
                         VALUES ('$today','$_POST[acc_type]','','$debit','$credit','')";
    $result = $conn->query($sql);
    if($result)
    {
       echo "success";
    }
   
}
?>