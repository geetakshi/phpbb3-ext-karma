#
# Do NOT manually edit this file!
#

# Table: 'phpbb_karma'
CREATE TABLE phpbb_karma (
	post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	giving_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	receiving_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	karma_score tinyint(4) DEFAULT '0' NOT NULL,
	karma_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	karma_comment blob NOT NULL
);

ALTER TABLE phpbb_users ADD COLUMN user_karma_score int(11) DEFAULT '0' NOT NULL;
