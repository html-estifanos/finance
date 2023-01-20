<?php
include("connection.php");
// general form          
?>
 <html>
<head>
    <title>main page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2 class="form-heading">input form</h2>
        <form action="index.php" method="post">
            <div class="input-container">
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
                     </select>
            </div>
            <div class="input-container">
            value : <input type="number" name="value">
            </div>
            <div class="input-container">
            debit : <input type="radio" name="dc" id="dr" value="debit">
            </div>
            <div class="input-container">
            credit : <input type="radio" name="dc" id="cr" value="credit">
            </div>
            <div>
            <input type="submit" value = "submit" name="add_transaction" class="btn">
            </div>
        </form>

       
    </div>
    <div class="form-container">
    <a href="journal.php" class="btn">journal</a></br></br>
        <a href="ledger.php" class="btn">ledger</a></br></br>
        <a href = "statments.php" class="btn">financial statments</a>
    </div>
</body>
</html>
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