<?php

namespace SoartexHD\PlayerData;

use SoartexHD\Devices\Device;
use SoartexHD\NameTag;
use pocketmine\Player;

class PlayerData
{
    private $p;
    private $player;
    private $devices;

    public function __construct(NameTag $p, Player $player)
    {
        $this->p = $p;
        $this->player = $player;
        $this->devices = new Device($p, $player);
    }

    public function removePlayer(){

        $player = $this->player;

        if(in_array($player, $this->p->win)){

            unset($this->p->win[array_search($player, $this->p->win)]);

        }elseif(in_array($player, $this->p->android)){

            unset($this->p->android[array_search($player, $this->p->android)]);

        }elseif(in_array($player, $this->p->ios)){

            unset($this->p->ios[array_search($player, $this->p->ios)]);

        }
    }

}