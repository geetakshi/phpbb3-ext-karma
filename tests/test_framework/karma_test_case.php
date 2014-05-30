<?php
/**
*
* @package phpBB Karma Testing
* @copyright (c) 2013 phpBB
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\karma\tests\test_framework;

abstract class karma_test_case extends \phpbb_test_case
{
	public function get_test_case_helpers()
	{
		if (!$this->test_case_helpers)
		{
			$this->test_case_helpers = new \phpbb\karma\tests\test_framework\karma_test_case_helpers($this);
		}

		return $this->test_case_helpers;
	}
}
