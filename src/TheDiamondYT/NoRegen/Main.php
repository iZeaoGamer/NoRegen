<?php

namespace TheDiamondYT\NoRegen;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityRegainHealthEvent;

class Main extends PluginBase implements Listener {
    
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onRegainHealth(EntityRegainHealthEvent $ev) {
        $block = $ev->getBlock();
        $reason = $ev->getRegainReason();
        $bypass = $ev->getPlayer()->hasPermission("noregen.bypass");
        
        if($block["regen"] && $reason === EntityRegainHealthEvent::CAUSE_REGEN && !$bypass) {
            $ev->setCancelled(true);
        }
        if($block["eating"] && $reason === EntityRegainHealthEvent::CAUSE_EATING && !$bypass) {
            $ev->setCancelled(true);
        }
        if($block["potion"] && $reason === EntityRegainHealthEvent::CAUSE_MAGIC && !$bypass) {
            $ev->setCancelled(true);
        }
        if($block["custom"] && $reason === EntityRegainHealthEvent::CAUSE_CUSTOM && !$bypass) {
            $ev->setCancelled(true);
        }
        if($block["saturation"] && $reason === EntityRegainHealthEvent::CAUSE_SATURATION && !$bypass) {
            $ev->setCancelled(true);
        }
    }
}
