<?php
namespace GAD;

use
pocketmine\event\player\PlayerChatEvent;
use pocketmine\level\Position;
use pocketmine\level\Explosion;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
     public function onEnable(){
     $this->getServer()->getPluginManager()->registerEvents($this,$this);
     $this->getLogger()->info("■■■■■■■■■■■■■■■");
     $this->getLogger()->info("            susses");
     $this->getLogger()->info("■■■■■■■■■■■■■■■");
 @mkdir($this->getDataFolder());
		$this->config = new Config($this->getDataFolder()."config", Config::YAML, array("boom" => "§4"));
     }
     public function onDisable(){
     $this->getLogger()->info("■■■■■■■■■■■■■■■");
     $this->getLogger()->info("            Disable");
     $this->getLogger()->info("■■■■■■■■■■■■■■■");
     }
     public function onChat(PlayerChatEvent $e){
     $e->setCancelled();
     $p=$e->getPlayer();
     $n=$p->getName();
     $x=$p->getX();
     $y=$p->getY();
     $z=$p->getZ();
     $level=$p->getLevel();
     $m=$e->getMessage();
     $t=mt_rand(1,6);
     if($t==1){
     $c="§a";
     }
     if($t==2){
     $c="§c";
     }
     if($t==3){
     $c="§e";
     }
     if($t==4){
     $c="§b";
     }
     if($t==5){
     $c="§l";
     }
     if($t==6){
     $c="§4";
     }
     if($c!=$this->config->get("boom")){
     $this->getServer()->broadcastmessage("$n §a-->$c $m.");
     return;
     }
     $explosion=new Explosion(new Position($x,$y,$z,$level),4);
		$explosion->explode();
     $this->getServer()->broadcastmessage("$n §a-->$c $m.");
     }
     }
     