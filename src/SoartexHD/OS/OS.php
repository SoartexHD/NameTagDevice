<?php

namespace SoartexHD\OS;

use SoartexHD\Devices\Device;
use SoartexHD\NameTag;
use pocketmine\Player;

class OS
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

    public function getOS(){

        //WINDOWS
        foreach ($this->devices->getWin10() as $windows){
            if($windows instanceof Player){
                $windows->setNameTag(
                    "§7".$windows->getName()."\n".
                    "§aWIN10"
                );
            }
        }

        //ANDROID
        foreach ($this->devices->getAndroid() as $android){
            if($android instanceof Player){
                $android->setNameTag(
                    "§7".$android->getName()."\n".
                    "§aAndroid"
                );
            }
        }

        //IOS
        foreach ($this->devices->getIOS() as $ios){
            if($ios instanceof Player){
                $ios->setNameTag(
                    "§7".$ios->getName()."\n".
                    "§aIOS"
                );
            }
        }

        //PS4
        foreach ($this->devices->getPS4() as $ps4){
            if($ps4 instanceof Player){
                $ps4->setNameTag(
                    "§7".$ps4->getName()."\n".
                    "§aPS4"
                );
            }
        }
    }

}