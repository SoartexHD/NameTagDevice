<?php

namespace SoartexHD\Devices;

use SoartexHD\NameTag;
use pocketmine\Player;

class Device
{

    private $p;
    private $player;

    public function __construct(NameTag $p, Player $player)
    {
        $this->p = $p;
        $this->player = $player;
    }

    public function getWin10(){
        return $this->p->win;
    }

    public function getAndroid(){
        return $this->p->android;
    }

    public function getIOS(){
        return $this->p->ios;
    }

    public function getPS4(){
        return $this->p->ps4;
    }

}