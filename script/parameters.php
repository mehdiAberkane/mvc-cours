<?php


if (!file_exists('config/parameters.yml')) {
	copy("config/parameters.yml.dist", "config/parameters.yml");
}
