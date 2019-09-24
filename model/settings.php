<?php 

function ConnectDB($servername, $password, $username, $dbname)
{
   return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

function GetAllComp($db, $start, $limit)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `comp` LIMIT $start, $limit";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function CountRow($db)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `comp`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function CountRowUpdate($db)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `update_list`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function GetCompByID($db, $id)
{

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `comp` WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function AddComp($db, $data)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO comp (naam_comp, hoeveelheid, maximum) VALUES (:naam, :hoeveel, :maximum)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':naam', $data['namecom'], PDO::PARAM_STR);
        $stmt->bindValue(':hoeveel', $data['hoeveelheid'], PDO::PARAM_INT);
        $stmt->bindValue(':maximum', $data['maximum'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function ChangeComp($db, $data, $id)
{

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE comp SET hoeveelheid = :hoeveel WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':hoeveel', $data['hoeveelheid'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function DeleteComp($db, $id)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM comp WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function GetAllUpdates($db, $start, $limit)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `update_list` ORDER BY time_of_update DESC LIMIT $start, $limit";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function DeleteUpdate($db, $id)
{
    
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM update_list WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function AddUpdate($db, $data, $naam_comp, $total)
{

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO update_list (student_numb, naam_comp, given_taken, total_in_stock, time_of_update) VALUES (:student, :naamcomp, :givetake, :total, :timeupdate)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':student', $data['studentennummer'], PDO::PARAM_INT);
        $stmt->bindValue(':naamcomp', $naam_comp, PDO::PARAM_STR);
        $stmt->bindValue(':givetake', $total, PDO::PARAM_INT);
        $stmt->bindValue(':total', $data['hoeveelheid'], PDO::PARAM_INT);
        $stmt->bindValue(':timeupdate', date("Y-m-d"), PDO::PARAM_STR);
        $stmt->execute();
        //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function SentEmail()
{

//Start een niewe PHPMailer instance
$mail = new PHPMailer;

// Set PHPMailer to use the sendmail transport
$mail->isSendmail();

//Set hier het e-mail adres van de afzender (dus jouw stagebedrijf)
//Voorbeeld: $mail->setFrom('remko.spaans@mkbwebsupport.nl', 'Remko Spaans');
$mail->setFrom('99045570@mydavinci.nl', 'Marco Spaans');

//Set who the message is to be sent to
$mail->addAddress('99045570@mydavinci.nl', 'Marco Spaans');

//Set the subject line
$mail->Subject = 'Hier komt het onderwerp van de mail';

//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<html><h1>Hallo Meneer Molengraaf</h1><p>dit is een test voor de e-mail functie</p></html>');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

}
?>