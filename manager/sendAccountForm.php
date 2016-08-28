<?php

date_default_timezone_set('America/Chicago');

$date = date("Ymd");

$accoutID = $_POST['accountID'];

$email = $_POST['email'];

$password = $_POST['password'];

$name = $_POST['name'];

$phoneNumber = $_POST['phoneNumber'];

$homeAddress = $_POST['homeAddress'];

$accountType = 1;

include "../../../dbincloc/southlake.inc";

$db = new mysqli($hostname, $usr, $pwd, $dbname);
if ($db->connect_error) {
    die('Unable to connect to database: ' . $db->connect_error);
}

//find if email has been used
if ($result = $db->prepare("select AccountID from AccountInfo where EmailAddress = ? limit 1;")) {
    $result->bind_param("s", $email);
    $result->execute();
    $result->bind_result($fetchedAccountID);
    $result->fetch();
    $result->close();

    //if email used and the ID is different from the input ID, go back to edit page.
    if (!empty($fetchedAccountID)) {
        if ($fetchedAccountID != $accoutID) {
            echo "<script>location.href='editAccount.php?isDuplicateEmail=1&accountID=$accoutID'</script>";
            $db->close();
            exit();
        }
    }
    //else
    //if update account
    if (isset($accoutID)) {
        if ($result1 = $db->prepare("update AccountInfo set EmailAddress = ?, Password = ?, Name1 = ?, PhoneNum1 = ?, HomeAddressLine1 = ?, UpdateTime = now() WHERE AccountID = ?;")) {
            $result1->bind_param("ssssss", $email, $password, $name, $phoneNumber, $homeAddress, $accoutID);
            $result1->execute();
            $result1->close();
        }
    } else { //create new accountID
        $result1 = $db->query("select AccountID from AccountInfo order by AccountID desc limit 1;");
        $row_cnt = $result1->num_rows;
        if ($row_cnt == 0) {
            $accountID = $date . "01";
        } else {
            $row = $result1->fetch_assoc();
            $accountID = $row["AccountID"];
            $accountID++;
        }
        $result1->free();

        if ($result2 = $db->prepare("insert into AccountInfo (AccountID, AccountTypeID, EmailAddress, Password, Name1, PhoneNum1, HomeAddressLine1, CreateTime, UpdateTime) values (?, ?, ?, ?, ?, ?, ?, now(), now());")) {
            $result2->bind_param("sssssss",
                $accountID,
                $accountType,
                $email,
                $password,
                $name,
                $phoneNumber,
                $homeAddress);
            $result2->execute();
            $result2->close();
        }
    }
}
$db->close();
echo "<script>location.href='accounts.php'</script>";
?>
