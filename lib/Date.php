<?php
/**
 * Created by PhpStorm.
 * User: isidoris-simplon
 * Date: 10/07/17
 * Time: 08:05
 */

class Date
{
    private $y;
    private $m;
    private $d;
    private $h;
    private $min;

    function __construct($date) // date in format yyyy-mm-dd-hh-mm
    {
        $split = explode("-", $date);
        $this->y = intval($split[0]);
        $this->m = intval($split[1]);
        $this->d = intval($split[2]);
        $this->h = intval($split[3]);
        $this->min = intval($split[4]);
    }

    function getDate () {
        $m = ["0", "janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet",
            "aout", "septembre", "octobre", "novembre", "decembre"];
        return $this->d . ' ' .  $m[$this->m] .  ' ' .  $this->y . ' at ' .
            $this->h . 'h ' . $this->min;
    }
}