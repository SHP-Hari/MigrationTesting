<?php

defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('addForeignKey'))
{
	/**
	 * @param string $table       Table name
	 * @param string $foreign_key Collumn name having the Foreign Key
	 * @param string $references  Table and column reference. Ex: users(id)
	 * @param string $on_delete   RESTRICT, NO ACTION, CASCADE, SET NULL, SET DEFAULT
	 * @param string $on_update   RESTRICT, NO ACTION, CASCADE, SET NULL, SET DEFAULT
	 *
	 * @return string SQL command
	 */
	function addForeignKey($table, $foreign_key, $references, $on_delete = 'RESTRICT', $on_update = 'RESTRICT')
	{
		$references = explode('(', str_replace(')', '', str_replace('`', '', $references)));
		return "ALTER TABLE `{$table}` ADD CONSTRAINT `{$table}_{$foreign_key}_fk` FOREIGN KEY (`{$foreign_key}`) REFERENCES `{$references[0]}`(`{$references[1]}`) ON DELETE {$on_delete} ON UPDATE {$on_update}";
	}
}
if ( ! function_exists('dropForeignKey'))
{
	/**
	 * @param string $table       Table name
	 * @param string $foreign_key Collumn name having the Foreign Key
	 *
	 * @return string SQL command
	 */
	function dropForeignKey($table, $foreign_key)
	{
		return "ALTER TABLE `{$table}` DROP FOREIGN KEY `{$foreign_key}`";
	}
}
if ( ! function_exists('addTrigger'))
{
	/**
	 * @param string $trigger_name Trigger name
	 * @param string $table        Table name
	 * @param string $statement    Command to run
	 * @param string $time         BEFORE or AFTER
	 * @param string $event        INSERT, UPDATE or DELETE
	 * @param string $type         FOR EACH ROW [FOLLOWS|PRECEDES]
	 *
	 * @return string SQL Command
	 */
	function addTrigger($trigger_name, $table, $statement, $time = 'BEFORE', $event = 'INSERT', $type = 'FOR EACH ROW')
	{
		return 'DELIMITER ;;' . PHP_EOL . "CREATE TRIGGER `{$trigger_name}` {$time} {$event} ON `{$table}` {$type}" . PHP_EOL . 'BEGIN' . PHP_EOL . $statement . PHP_EOL . 'END;' . PHP_EOL . 'DELIMITER ;;';
	}
}
if ( ! function_exists('dropTrigger'))
{
	/**
	 * @param string $trigger_name Trigger name
	 *
	 * @return string SQL Command
	 */
	function dropTrigger($trigger_name)
	{
		return "DROP TRIGGER `{$trigger_name}`;";
	}
}

if ( ! function_exists('getDbAttributes')){
	function getDbAttributes(){
		return array(
			'ENGINE' => 'InnoDB',
			'CHARACTER SET' => 'utf8mb4',
			'COLLATE' => 'utf8mb4_unicode_ci'
		);
	}
}
