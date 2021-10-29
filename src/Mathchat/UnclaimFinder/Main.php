<?php

namespace Mathchat\UnclaimFinder;

use pocketmine\plugin\PluginBase;
use Mathchat\UnclaimFinder\Events\Listeners\PlayerListener;
use Mathchat\UnclaimFinder\Tasks\PopupTask;

class Main extends PluginBase
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new PlayerListener($this), $this);
        $array = $this->getConfig()->getAll();
        $this->saveDefaultConfig();
        $this->getScheduler()->scheduleRepeatingTask(new PopupTask($this), $array['task_tick']);
    }
}