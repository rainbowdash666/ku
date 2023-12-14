<?php
const SITE_ROOT = __DIR__; //буедт содержать абсолютный путь к директории текущего скрипта
const  BASE_URL = "http://localhost/siteeee/"; //базовый URL-адрес сайта
define("ROOT_PATH", realpath(dirname(__FILE__))); //вывод полного пути, включая домен сайта (из относительного в абсолютный)