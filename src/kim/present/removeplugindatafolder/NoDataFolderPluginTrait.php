<?php

/**
 *
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the MIT License. see <https://opensource.org/licenses/MIT>.
 *
 * @author       PresentKim (debe3721@gmail.com)
 * @link         https://github.com/PresentKim
 * @license      https://opensource.org/licenses/MIT MIT License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace kim\present\removeplugindatafolder;

use pocketmine\plugin\PluginBase;

/** This trait override most methods in the {@link PluginBase} abstract class. */
trait NoDataFolderPluginTrait{

    /** Trying remove empty data dir on plugin load */
    protected function onLoad() : void{
        PluginDataFolderEraser::erase($this);
    }

    /** Trying remove empty data dir on plugin enable */
    protected function onEnable() : void{
        PluginDataFolderEraser::erase($this);
    }

    /** Trying remove empty data dir on plugin disable */
    protected function onDisable() : void{
        PluginDataFolderEraser::erase($this);
    }
}
