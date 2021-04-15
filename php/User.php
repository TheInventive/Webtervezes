<?php
class User
{
    private $username;
    private $password;
    private $date_of_birth;
    private $sex;
    private $email;
    private $tel;
    private $file;

    public static function loadUsers($path) {
        $users = [];

        $file = fopen($path, "r");
        if ($file === FALSE)
            die("HIBA: A fájl megnyitása nem sikerült!");

        while (($line = fgets($file)) !== FALSE) {
            $user = unserialize($line);
            $users[] = $user;

        }
        fclose($file);
        return $users;
    }


    public static function saveUsers($path, $users) {
        $file = fopen($path, "w");
        if ($file === FALSE)
            die("HIBA: A fájl megnyitása nem sikerült!");

        foreach($users as $user) {
            $serialized_user = serialize($user);
            fwrite($file, $serialized_user . "\n");
        }

        fclose($file);
    }

    public static function updateUsers() {
        $_SESSION["user"]->setFile(htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])));
        $fiokok = User::loadUsers("../users.txt");
        for ($x = 0; $x < count($fiokok); $x++)
        {
            if ($fiokok[$x]->getUsername() == $_SESSION["user"]->getUsername())
            {
                $fiokok[$x] = $_SESSION["user"];
            }
        }
        User::saveUsers("../users.txt", $fiokok);

    }

    function __construct($username, $password, $date_of_birth, $sex, $email, $tel) {
        $this->username = $username;
        $this->password = $password;
        $this->date_of_birth = $date_of_birth;
        $this->sex = $sex;
        $this->email = $email;
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


}