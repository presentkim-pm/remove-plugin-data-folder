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
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://opensource.org/licenses/MIT MIT License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 * @noinspection SpellCheckingInspection
 */

declare(strict_types=1);

namespace kim\present\traits\removeplugindatadir;

use pocketmine\plugin\PluginBase;

use function count;
use function file_exists;
use function is_dir;
use function rmdir;
use function scandir;

/** This trait override most methods in the {@link PluginBase} abstract class. */
trait RemovePluginDataDirTrait{
    /** Trying remove empty data dir on plugin load */
    protected function onLoad() : void{
        $this->removePluginDataDir();
    }

    /** Trying remove empty data dir on plugin enable */
    protected function onEnable() : void{
        $this->removePluginDataDir();
    }

    /** Trying remove empty data dir on plugin disable */
    protected function onDisable() : void{
        $this->removePluginDataDir();
    }

    private function removePluginDataDir() : void{
        /** @var PluginBase $this */
        $dataFolder = $this->getDataFolder();
        if(
            file_exists($dataFolder) && // If the data folder exists
            is_dir($dataFolder) && // And it's a directory
            count(scandir($dataFolder)) === 2 // And it contains only the . and .. folders
        ){
            rmdir($dataFolder); // Remove the data folder
        }
    }
}