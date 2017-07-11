<?php
class User {
    private $user;
    private $password;
    private $salt;
    
    private $img;
    private $adresse;
    private $firstname;
    private $lastname;
    private $recette;
    private $followers;
    private $subscribes;
 
    function __construct($user, $password, $img, $adresse, $firstname, $lastname,
            $recette = [], $followers = [], $subscribes = []) {
        $this->user = $user;
        $this->salt = hash("sha256", rand());
        $this->password = hash("sha256", $password.$this->salt);
        $this->img = $img;
        $this->adresse = $adresse;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->recette = $recette;
        $this->followers = $followers;
        $this->subscribes = $subscribes;
    }

    function edit($password, $adresse, $firstname, $lastname) {
        if ($password != false) {
            $this->salt = hash("sha256", rand());
            $this->password = hash("sha256", $password . $this->salt);
        }
        $this->adresse = $adresse;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }
    
    function addFollower (String $follower) {
        if (in_array($follower, $this->followers) === false) {
            array_push($this->followers, $follower);
        }
    }
    
    function rmFollower (String $follower) {
        $pos = in_array($follower, $this->followers);
        array_splice($this->followers, 0, $pos);
    }
    
    function addSubscriber (String $sub) {
        if (in_array($sub, $this->subscribes) === false) {
            array_push($this->subscribes, $sub);
        }
    }
    
    function rmSubscriber (String $sub) {
        $pos = in_array($sub, $this->subscribes);
        array_splice($this->subscribes, 0, $pos);
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return array
     */
    public function getRecette(): array
    {
        return $this->recette;
    }

    /**
     * @return array
     */
    public function getFollowers(): array
    {
        return $this->followers;
    }

    /**
     * @return array
     */
    public function getSubscribes(): array
    {
        return $this->subscribes;
    }


}
