<?php
include_once 'User.php';
include_once 'Event.php';
class Data {
    private $users;
    private $events;
    private $tags;

    private function verif_event() {
        if (count($this->events)) {
            foreach ($this->events as $key=>$event) {
                $eventdate = intval(str_replace("-", "", $event->getDate()));
                $actualdate = intval(str_replace("-", "", date("Y-m-d-H-i")));
                if ($eventdate < $actualdate) {
                    array_splice($this->events, $key, 1);
                }
            }
        }
    }

    function __construct() {
        if (basename(__DIR__) == "action" || basename(__DIR__) == "lib") {
            $path = __DIR__ . '/../';
        } else {
            $path = __DIR__ . '/';
        }
        if (file_exists($path . "data/users") && file_exists($path . "data/events")
            && file_exists($path . "data/tags")) {
            $this->users = unserialize(file_get_contents($path . "data/users"));
            $this->events = unserialize(file_get_contents($path . "data/events"));
            $this->tags = unserialize(file_get_contents($path . "data/tags"));
        } else {
            $this->users = [];
            $this->events = [];
            $this->tags = [];
        }
        $this->verif_event();
    }

    function saveData() {
        if (basename(__DIR__) == "action" || basename(__DIR__) == "lib") {
            $path = __DIR__ . '/../';
        } else {
            $path = __DIR__ . '/';
        }
        if (!is_dir($path . "data")) {
            mkdir($path . "data");
        }
        $fd = fopen($path . "data/users", "w+");
        fwrite($fd, serialize($this->users));
        fclose($fd);
        $fda = fopen($path . "data/events", "w+");
        fwrite($fda, serialize($this->events));
        fclose($fda);
        $fdb = fopen($path . "data/tags", "w+");
        fwrite($fdb, serialize($this->tags));
        fclose($fdb);
    }
    
    function __destruct() {
        $this->saveData();
    }

    function verifUser ($userVerif, $passwordVerif) {
        foreach ($this->users as $user) {
            if ($user->getUser() == $userVerif
                    && $user->getPassword() == hash("sha256", $passwordVerif . $user->getSalt())) {
                return true;
            }
        }
        return false;
    }
    
    function userExists ($username) {
        foreach ($this->users as $user) {
            if ($user->getUser() == $username) {
                return true;
            }
        }
        return false;        
    }

    function getUser($username) {
        foreach ($this->users as $user) {
            if ($user->getUser() == $username) {
                return $user;
            }
        }
        return false;
    }
    
    function addUser($user) {
        foreach ($this->users as $u) {
            if ($u->getUser() == $user->getUser()) {
                return false;
            }
        }
        array_push($this->users, $user);
    }

    function addEvent(Event $event) {
        $temp = [];
        foreach ($this->events as $e) {
            if ($e->getTitle() == $event->getTitle()) {
                return false;
            }
        }
        $newDate = intval(str_replace("-", "", $event->getDate()));
        foreach ($this->events as $e) {
            $thisDate =  intval(str_replace("-", "", $e->getDate()));
            if ($thisDate > $newDate && $newDate != -1) {
                $temp[] = $event;
                $newDate = -1;
            }
            $temp[] = $e;
        }
        if ($newDate != -1) {
            $temp [] = $event;
        }
        $this->events = $temp;
    }
    
    function addTags ($tags) {
        if (gettype($tags) == "string") {
            array_push($this->tags, $tags);
        } else {
            foreach ($tags as $tag) {
                if (in_array($tag, $this->tags) === false) {
                    array_push($this->tags, $tag);                    
                }
            }
        }
    }

    function getEvent($eventTitle) {
        foreach ($this->events as $event) {
            if ($event->getTitle() == $eventTitle) {
                return $event;
            }
        }
        return false;
    }
//error, profile modifier, profile redirect if not logged
    function searchUsers ($text) {
        $out = [];
        if (empty($text)) {
            return $this->users;
        } else {
            foreach ($this->users as $u) {
                if (stripos($u->getUser(), $text) !== false && in_array($u, $out) === false) {
                    $out[] = $u;
                }
            }
        }
        return $out;
    }

    function searchEvents ($text, $tags) {
        $out = [];
        if (empty($text)) {
            foreach ($this->events as $e) {
                if (count(array_intersect($tags, $e->getTags())) == count($tags)) {
                    $out[] = $e;
                }
            }
        } else {
            foreach ($this->events as $e) {
                if (stripos($e->getTitle(), $text) !== false && in_array($e, $out) === false
                    || count(array_intersect($tags, $e->getTags())) == count($tags)) {
                    $out[] = $e;
                }
            }
        }
        return $out;
    }

    function getUsers() {
        return $this->users;
    }

    function getEvents() {
        return $this->events;
    }

    function getTags() {
        return $this->tags;
    }
}