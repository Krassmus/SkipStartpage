<?php

class InitPlugin extends Migration
{
    function up()
    {
        DBManager::get()->exec("
            INSERT IGNORE INTO `config` (`config_id`, `parent_id`, `field`, `value`, `is_default`, `type`, `range`, `section`, `position`, `mkdate`, `chdate`, `description`, `comment`, `message_template`) 
            VALUES
                (MD5('SKIPSTARTPAGE_REDIRECT_TO'), 
                '', 
                'SKIPSTARTPAGE_REDIRECT_TO', 
                'dispatch.php/my_courses', 
                0, 
                'string', 
                'global', 'global', 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 
                'Zu welcher Seite soll der Nutzer weitergeleitet werden, wenn er die Startseite betritt? Default: dispatch.php/my_courses', 
                '', '')
        ");
    }

    function down()
    {
        DBManager::get()->exec("
            DELETE FROM `config`
            WHERE `config_id` = MD5('SKIPSTARTPAGE_REDIRECT_TO')
        ");
    }
}