<?php
class Event {
    private $title;
    private $date;
    private $type;
    private $adresse;
    private $img;
    private $creator;
    private $tags;
    private $users;

    function __construct($title, $date, $type, $adresse, $img, $creator, $tags = [], array $users = []) {
        $this->title = $title;
        $this->date = $date;
        $this->type = $type;
        $this->adresse = $adresse;
        $this->img = $img;
        $this->creator = $creator;
        $this->tags = $tags;
        $this->users =$users;
    }

    function html() {
    }
    
    function addUser(String $user) {
        if (in_array($user, $this->users) == false) {
            if (isset($this->users) || count($this->users) == 0) {
                array_push($this->users, $user);            
            } else {
                $this->users = [$user];
            }
        }
    }
    
    function getTitle() {
        return $this->title;
    }

    function getDate() {
        return $this->date;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getImg()
    {
        return $this->img;
    }


    public function getCreator(): User
    {
        return $this->creator;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}
