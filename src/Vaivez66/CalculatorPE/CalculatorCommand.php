<?php

namespace Vaivez66\CalculatorPE;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat as TF;

class CalculatorCommand extends PluginBase implements CommandExecutor{

    public function __construct(Calculator $plugin){
        $this->plugin = $plugin;
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        switch(strtolower($cmd->getName())){
            case "cal":
                if($sender->hasPermission("cal.pe")){
                    if(isset($args[0])){
                        switch($args[0]){
                            case "add":
                            case "+":
                                if(isset($args[1]) && isset($args[2])){
                                    if(is_numeric($args[1]) && is_numeric($args[2])){
                                        array_shift($args);
                                        $sender->sendMessage(TF::GREEN . "The result is " . $this->plugin->add($args));
                                    }
                                    else{
                                        $sender->sendMessage(TF::RED . "Please use numbers as arguments");
                                    }
                                }
                                else{
                                    $sender->sendMessage(TF::RED . "Please at least use 2 number");
                                }
                                break;
                            case "sub":
                            case "-":
                                if(isset($args[1]) && isset($args[2])){
                                    if(is_numeric($args[1]) && is_numeric($args[2])){
                                        array_shift($args);
                                        $sender->sendMessage(TF::GREEN . "The result is " . $this->plugin->sub($args));
                                    }
                                    else{
                                        $sender->sendMessage(TF::RED . "Please use numbers as arguments");
                                    }
                                }
                                else{
                                        $sender->sendMessage(TF::RED . "Please at least use 2 number");
                                }
                                break;
                            case "multiply":
                            case "*":
                                if(isset($args[1]) && isset($args[2])){
                                    if(is_numeric($args[1]) && is_numeric($args[2])){
                                        array_shift($args);
                                        $sender->sendMessage(TF::GREEN . "The result is " . $this->plugin->multiply($args));
                                    }
                                    else{
                                        $sender->sendMessage(TF::RED . "Please use numbers as arguments");
                                    }
                                }
                                else{
                                    $sender->sendMessage(TF::RED . "Please at least use 2 number");
                                }
                                break;
                            case "divide":
                            case "/":
                                if(isset($args[1]) && isset($args[2])){
                                    if(is_numeric($args[1]) && is_numeric($args[2])){
                                        array_shift($args);
                                        $sender->sendMessage(TF::GREEN . "The result is " . $this->plugin->divide($args));
                                    }
                                    else{
                                        $sender->sendMessage(TF::RED . "Please use numbers as arguments");
                                    }
                                }
                                else{
                                    $sender->sendMessage(TF::RED . "Please at least use 2 number");
                                }
                                break;
                            default:
                                $sender->sendMessage(TF::YELLOW . "Available action: ");
                                $sender->sendMessage(TF::YELLOW . "- add (+)");
                                $sender->sendMessage(TF::YELLOW . "- sub (-)");
                                $sender->sendMessage(TF::YELLOW . "- multiply (*)");
                                $sender->sendMessage(TF::YELLOW . "- divide (/)");
                        }
                    }
                    else{
                        $sender->sendMessage(TF::YELLOW . "Available action: ");
                        $sender->sendMessage(TF::YELLOW . "- add (+)");
                        $sender->sendMessage(TF::YELLOW . "- sub (-)");
                        $sender->sendMessage(TF::YELLOW . "- multiply (*)");
                        $sender->sendMessage(TF::YELLOW . "- divide (/)");
                    }
                }
                else{
                    $sender->sendMessage(TF::RED . "You do not have permission to perform this action");
                }
                break;
        }
    }

}