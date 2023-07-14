<?php
require_once 'app/config.php';
require_once 'app/utils.php';
require_once 'app/enqueue.php';
require_once 'app/cpt.php';

define("URLTEMA", get_bloginfo("template_url"));
define("RESOURCES", URLTEMA . "/resources/");
define("IMGPATH", RESOURCES . "/images/");
define("SVGPATH", IMGPATH . "/svg/");
