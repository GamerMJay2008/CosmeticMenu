<?php 

namespace NinjaKnights\CosmeticMenu\forms;
    
use NinjaKnights\CosmeticMenu\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\Player;
use pocketmine\item\Item;
    
class GadgetForm {
    
    private $main;

    public function __construct(Main $main){
        $this->main = $main;
    }

     public function openGadgets($player) {
        $form = new SimpleForm(function (Player $player, $data) {
            $result = $data;
            if($result === null) {
                return true;
            }
            switch($result) {
                case 0:
                    if($player->hasPermission("cosmeticmenu.gadgets.tntlauncher")){
                        $inv = $player->getInventory();
                        $slot = $this->main->config->getNested("Cosmetic.Slot");
                        $air = Item::get(0, 0 , 1);
                        $inv->setItem($slot,$air,true);
		
		                $item = Item::get(352, 0, 1);
                        $item->setCustomName("TNT-Launcher");
                        $inv->setItem($slot,$item,true);
                    
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem($slot+1,$item1,true);
			
                    }
                break;

                case 1:
                    if($player->hasPermission("cosmeticmenu.gadgets.lightningstick")){
                        $inv = $player->getInventory();
                        $slot = $this->main->config->getNested("Cosmetic.Slot");
                        $air = Item::get(0, 0 , 1);
                        $inv->setItem($slot,$air,true);
		
                        $item = Item::get(369, 0, 1);
                        $item->setCustomName("Lightning Stick");
                        $inv->setItem($slot,$item,true);

                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem($slot+1,$item1,true);

                    }
                break;

                case 2:
                    if($player->hasPermission("cosmeticmenu.gadgets.leaper")){
                        $inv = $player->getInventory();
                        $slot = $this->main->config->getNested("Cosmetic.Slot");
                        $air = Item::get(0, 0 , 1);
                        $inv->setItem($slot,$air,true);
		
		                $item = Item::get(288, 0, 1);
		                $item->setCustomName("Leaper");
                        $inv->setItem($slot,$item,true);
                        
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem($slot+1,$item1,true);

                    }
                break;

                case 3:
                    $this->main->getForms()->menuForm($player);
                break;
            }
        });
           
        $form->setTitle("Gadgets");
        $form->setContent($this->main->gadgetFormContent);
        if($this->main->tntlauncher){
            $form->addButton("TNT-Launcher",0,"",0);
        }
        if($this->main->lightningstick){
            $form->addButton("Lightning Stick",0,"",1);
        }
        if($this->main->leaper){
            $form->addButton("Leaper",0,"",2);
        }
        $form->addButton("§l§8<< Back",0,"",3);
        $form->sendToPlayer($player);
        return $form;
    }
}