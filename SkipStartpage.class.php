<?php

class SkipStartpage extends StudIPPlugin implements SystemPlugin
{

    public function __construct()
    {
        if (Navigation::hasItem("/start")) {
            $start = Navigation::getItem("/start");
            $start->getImage();
            $start->setImage(null);
            $start->setActiveImage(null);
        }
        $page = $_SERVER['REQUEST_URI'];
        if (mb_strpos($page, "?") !== false) {
            $page = mb_substr($page, 0, mb_strpos($page, "?"));
        }
        $is_startpage = (mb_stripos($page, "dispatch.php/start") !== false);
        if ($is_startpage && Config::get()->SKIPSTARTPAGE_REDIRECT_TO) {
            header("Location: ". URLHelper::getURL(Config::get()->SKIPSTARTPAGE_REDIRECT_TO));
            die();
        }
    }
}