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

use pocketmine\plugin\Plugin;

use function count;
use function file_exists;
use function is_dir;
use function rmdir;
use function scandir;

final class PluginDataFolderRemover{
	public static function run(Plugin $plugin) : void{
		$dataFolder = $plugin->getDataFolder();
		if(
			file_exists($dataFolder) // If the data folder exists
			&& is_dir($dataFolder) // And it's a directory
			&& count(scandir($dataFolder)) === 2 // And it contains only the . and .. folders
		){
			rmdir($dataFolder); // Remove the data folder
		}
	}
}
