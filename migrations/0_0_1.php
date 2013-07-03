<?php
/**
*
* @package phpBB Karma
* @copyright (c) 2013 rechosen
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

class phpbb_ext_phpbb_karma_migrations_0_0_1 extends phpbb_db_migration
{
	public function effectively_installed()
	{
		$sql = 'SELECT config_value
				FROM ' . $this->table_prefix . "config
				WHERE config_name = 'phpbb_karma_version'";
		$result = $this->db->sql_query($sql);
		$version = $this->db->sql_fetchfield('config_value');
		$this->db->sql_freeresult($result);

		return $version && (version_compare($version, '0.0.1') >= 0);
	}

	static public function depends_on()
	{
		return array('phpbb_db_migration_data_310_dev');
	}

	public function update_schema()
	{
		$ret = array(
			'add_tables'	=> array(
				$this->table_prefix . 'karma'	=> array(
					'COLUMNS'		=> array(
						'post_id'			=> array('UINT', 0),
						'giving_user_id'	=> array('UINT', 0),
						'receiving_user_id'	=> array('UINT', 0),
						'karma_score'		=> array('TINT:4', 0),
						'karma_time'		=> array('UINT:11', 0),
						'karma_comment'		=> array('MTEXT_UNI', ''),
					),
					'PRIMARY KEY'	=> array('post_id', 'giving_user_id'),
				),
			),
			'add_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'user_karma_score'	=> array('INT:11', 0),
				),
			),
		);
		file_put_contents('/tmp/woei', print_r($ret, true));
		return $ret;
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'user_karma_score',
				),
			),
			'drop_tables'	=> array(
				$this->table_prefix . 'karma',
			),
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('phpbb_karma_version', '0.0.1')),
		);
	}
}
