
/* Save Users in Database */
CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique user id',
	name varchar(64) NOT NULL COMMENT 'User Full Name',
	email varchar(64) NOT NULL COMMENT 'User Email Address',
    username varchar(64) NOT NULL COMMENT 'User account Username',
    password varchar(64) NOT NULL COMMENT 'User account Password',
	access_token TEXT DEFAULT NULL COMMENT 'This is access token used for create article',
    update_token varchar(255) DEFAULT NULL COMMENT 'This is used for update access token',
	expire_time datetime COMMENT 'Time when this access token will expire',
	today_count int DEFAULT 0 COMMENT 'How much Article posted by this user today',
	lifetime_count int DEFAULT 0 COMMENT 'How much Article posted by this user lifetime',
	enabled BOOLEAN NOT NULL DEFAULT 0 COMMENT 'This set user is enabled or not. Default Disabled',
	PRIMARY KEY (id)
);

/* Save Refrence of articles to database */
CREATE TABLE articles (
	id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique id',
	userid int(11) NOT NULL COMMENT 'Unique user id',
	article_id varchar(32) NOT NULL COMMENT 'Blogger Unique article id',
	PRIMARY KEY (id)
);