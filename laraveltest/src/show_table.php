<?
class User
{
    public $name;
    public $email;
    public $age;

    public function __construct($name, $email, $age)
    {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }
}


class UserTable
{
    private $users = [];

    public function addUser($user)
    {
        $this->users[] = $user;
    }



    public function clearUsers()
    {
        $this->users = [];
    }

    public function removeUser($user)
    {
        foreach ($this->users as $key => $value) {
            if ($value === $user) {
                unset($this->users[$key]);
            }
        }
    }

    public function removeUserByIndex($index)
    {
        if (isset($this->users[$index])) {
            unset($this->users[$index]);
        }
    }

    public function removeUserByEmail($email)
    {
        foreach ($this->users as $key => $user) {
            if ($user->email === $email) {
                unset($this->users[$key]);
            }
        }
    }

    public function removeUserByName($name)
    {
        foreach ($this->users as $key => $user) {
            if ($user->name === $name) {
                unset($this->users[$key]);
            }
        }
    }

    public function displayTable()
    {
        echo "<table border='1' class='table table-striped'>";
        echo "<tr><th>Name</th><th>Email</th><th>Age</th><th>Action</th></tr>";
        foreach ($this->users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user->name) . "</td>";
            echo "<td>" . htmlspecialchars($user->email) . "</td>";
            echo "<td>" . htmlspecialchars($user->age) . "</td>";
            echo "<td>";
            echo "<button type='submit' name='remove' class='btn btn-danger'>Remove</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

//
// Example usage
$user1 = new User("John Doe", "johndoe@gmail.com", 30);
$user2 = new User("Jane Smith", "jane.smith@gmail.con", 25);
$user3 = new User("Alice Johnson", "alice.johnon@gmail.com", 28);

$userTable = new UserTable();
$userTable->addUser($user1);
$userTable->addUser($user2);
$userTable->addUser($user3);
$userTable->removeUserByEmail("jane.smith@gmail.con");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="p-3 mb-2 bg-light text-dark">
    <div class="container p-5">
        <h2 class="text-center display-5">User Table</h2>
        <div class="container">
            <?php
            $userTable->displayTable();
            ?>
        </div>
    </div>
    <div class="footer">
    </div>
</body>

</html>