<?php

namespace TheDiamondYT\NoRegen;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
    
    public function onEnable(): void{
         $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onPlayerJoin(PlayerJoinEvent $ev) {
        $config = $this->getConfig()->get("message");
        $player = $ev->getPlayer();
        
        if($this->getConfig()->get("message")) {
            $player->sendMessage($this->getConfig()->get("message") === "text");
        }
    }
    
    public function onRegainHealth(EntityRegainHealthEvent $ev) {
        $block = $this->getConfig()->get("block");
        $reason = $ev->getRegainReason();
        
        if($this->getConfig()->get("block") === "regen" && $reason === EntityRegainHealthEvent::CAUSE_REGEN) {
            $ev->setCancelled(true);
        }
        if($this->getConfig()->get("block") === "eating" && $reason === EntityRegainHealthEvent::CAUSE_EATING) {
            $ev->setCancelled(true);
        }
        if($this->getConfig()->get("block") === "potion" && $reason === EntityRegainHealthEvent::CAUSE_MAGIC) {
            $ev->setCancelled(true);
        }
        if($this->getConfig()->get("block") === "custom" && $reason === EntityRegainHealthEvent::CAUSE_CUSTOM) {
            $ev->setCancelled(true);
        }
        if($this->getConfig()->get("block") === "saturation" && $reason === EntityRegainHealthEvent::CAUSE_SATURATION) {
            $ev->setCancelled(true);
        }
    }
}
