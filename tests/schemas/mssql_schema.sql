/*

 Do NOT manually edit this file!

*/

BEGIN TRANSACTION
GO

/*
	Table: 'phpbb_karma'
*/
CREATE TABLE [phpbb_karma] (
	[post_id] [int] DEFAULT (0) NOT NULL ,
	[giving_user_id] [int] DEFAULT (0) NOT NULL ,
	[receiving_user_id] [int] DEFAULT (0) NOT NULL ,
	[karma_score] [int] DEFAULT (0) NOT NULL ,
	[karma_time] [int] DEFAULT (0) NOT NULL ,
	[karma_comment] [text] DEFAULT ('') NOT NULL 
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO



COMMIT
GO

