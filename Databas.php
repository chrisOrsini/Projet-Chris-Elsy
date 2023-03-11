<?php  

class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "mes_images";


    /*---------------------
    CONNECTION A LA BASE DE DONN2E MYSQL
    -----------------------*/

    public function connect()
    {
        try {
            // $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ', ' . $this->password, $this->username);
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;", $this->username, $this->password);
        } catch (PDOException $e) {

            print "Un problème est surgit lors de votre connection :"
                . $e->getMessage() . "<br/>";
        }

         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
 public function creade(){
    $conn = $this->connect();

    $msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {

    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    // $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $lastname = isset($_POST['lastname']);
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = $_POST['phone'];
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    // $stmt = $pdo->prepare('INSERT INTO users(lastname,name,email,phone,title,created) VALUES (:lastname, :name, :email, :phone, :title, :created)');
    // $stmt->execute([$lastname, $name, $email, $phone, $title, $created]);

    $stmt = $conn->prepare('INSERT INTO users(lastname,name,email,phone,title,createad) VALUES (?,?,?,?,?,?)');
    $stmt->execute([$lastname, $name, $email, $phone, $title, $created]);
    // Output message
    $msg = 'Created Successfully!';
            }
 }

 public function update(){
    $conn = $this->connect();
    $msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $conn->prepare('UPDATE users SET lastname = ?, name = ?, email = ?, phone = ?, title = ?, createad = ? WHERE id = ?');
        $stmt->execute([$id, $name, $email, $phone, $title, $created, $_GET['id']]);
        $msg = 'Updated Successfully!';
        }
    // Get the contact from the contacts table
        $stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_GET['id']]);
         $contact = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
            }
    } else {
    exit('No ID specified!');
    }
}

public function delete(){
    $conn = $this->connect();
    $msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $conn->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
            header('location: read.php');
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}

}




}



?>