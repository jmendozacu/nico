<?php

/*

Plumrocket Inc.

NOTICE OF LICENSE

This source file is subject to the End-user License Agreement
that is available through the world-wide-web at this URL:
http://wiki.plumrocket.net/wiki/EULA
If you are unable to obtain it through the world-wide-web, please
send an email to support@plumrocket.com so we can send you a copy immediately.font-size:14px

@package	Plumrocket_Url_Manager-v1.2.x
@copyright	Copyright (c) 2013 Plumrocket Inc. (http://www.plumrocket.com)
@license	http://wiki.plumrocket.net/wiki/EULA  End-user License Agreement
 
*/

$installer = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE `{$this->getTable('urlmanager_rules')}`
ADD `store_id` VARCHAR( 32 ) NOT NULL DEFAULT '0' AFTER `priority`;
");

$installer->endSetup();