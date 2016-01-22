<?php

namespace Vaivez66\CalculatorPE;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class Calculator extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->getServer()->getLogger()->info(TF::GREEN . "CalculatorPE is ready!");
    	$this->getCommand("cal")->setExecutor(new CalculatorCommand($this));
    }
    
    public function add(array $num){
    	$result = 0;
    	foreach($num as $n){
    	    $result += $n;
    	}
    	return $result;
    }

    public function sub(array $num){
    	$result = $num[0];
    	array_shift($num);
    	foreach($num as $n){
    	    $result -= $n;
    	}
    	return $result;
    }
    
    public function multiply(array $num){
	$result = 1;
	foreach($num as $n){
	    $result *= $n;
	}
	return $result;
    }
    
    public function divide(array $num){
	$result = $num[0];
	array_shift($num);
	foreach($num as $n){
	    $result /= $n;
	}
	return $result;
    }

    public function onDisable(){
	$this->getServer()->getLogger()->info(TF::RED . "CalculatorPE was disabled!");
    }
    
}
