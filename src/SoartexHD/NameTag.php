<?php
/**
 * Created by PhpStorm.
 * User: paula
 * Date: 24.07.2019
 * Time: 11:16
 */

namespace SoartexHD;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\AutomationClientConnectPacket;
use pocketmine\network\mcpe\protocol\LoginPacket;
use pocketmine\network\mcpe\protocol\StartGamePacket;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use SoartexHD\Devices\Device;
use SoartexHD\OS\OS;
use SoartexHD\PlayerData\PlayerData;

class NameTag extends PluginBase implements Listener
{
    private $os;
    private $playerdata;
    private $device;

    //DEVICES
    public $win = [];
    public $android = [];
    public $ios = [];
    public $ps4 = [];

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(
            " \n ".
            "\n §7[§bNameTagDevice§7] §aaktiviert... \n".
            "§9Writen by §eSoartexHD \n".
            "§9github: §ehttps://github.com/SoartexHD \n".
            " \n "
        );
    }

    public function DataPacketReceive(DataPacketReceiveEvent $event){
        $player = $event->getPlayer();
        $packet = $event->getPacket();
        $this->device = new Device($this, $player);

        if ($packet instanceof LoginPacket){

            $dv = $packet->clientData["DeviceOS"];
            switch ($dv){
                case 7:
                    $this->win[] = $player;
                    break;
                case 1:
                    $this->android[] = $player;
                    break;
                case 2:
                    $this->ios[] = $player;
                    break;
                case 11:
                    $this->ps4[] = $player;
                    break;
            }
        }
    }

    public function onJoin(PlayerJoinEvent $event){

        $player = $event->getPlayer();
        $this->os = new OS($this, $player);


        $this->os->getOS();

    }

    public function onQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();

        $this->playerdata = new PlayerData($this, $player);
        $this->playerdata->removePlayer();
    }

}