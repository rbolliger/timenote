
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- timenote_project
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timenote_project`;


CREATE TABLE `timenote_project`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`slug` VARCHAR(60),
	`lft` INTEGER  NOT NULL,
	`rgt` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `timenote_project_I_1`(`title`),
	KEY `timenote_project_I_2`(`slug`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- timenote_project_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timenote_project_category`;


CREATE TABLE `timenote_project_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`is_working` TINYINT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `timenote_project_category_I_1`(`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- timenote_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timenote_type`;


CREATE TABLE `timenote_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`slug` VARCHAR(60),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `timenote_type_I_1`(`name`),
	KEY `timenote_type_I_2`(`slug`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- hour
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `hour`;


CREATE TABLE `hour`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_id` INTEGER  NOT NULL,
	`type_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`start_dt` DATETIME,
	`end_dt` DATETIME,
	`comment` VARCHAR(255)  NOT NULL,
	`user_profile_version` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `hour_FI_1` (`project_id`),
	CONSTRAINT `hour_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `timenote_project` (`id`),
	INDEX `hour_FI_2` (`type_id`),
	CONSTRAINT `hour_FK_2`
		FOREIGN KEY (`type_id`)
		REFERENCES `timenote_type` (`id`),
	INDEX `hour_FI_3` (`user_id`),
	CONSTRAINT `hour_FK_3`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `hour_FI_4` (`user_profile_version`),
	CONSTRAINT `hour_FK_4`
		FOREIGN KEY (`user_profile_version`)
		REFERENCES `sf_guard_user_profile` (`version`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- timenote_dayoff
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timenote_dayoff`;


CREATE TABLE `timenote_dayoff`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`date` DATE,
	`yearly` TINYINT,
	`name` VARCHAR(100),
	`description` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`remember` TINYINT,
	`first_name` VARCHAR(120),
	`last_name` VARCHAR(120),
	`email` VARCHAR(255),
	`birthday` DATE,
	`sciper` VARCHAR(10),
	`created_by` INTEGER,
	`version` INTEGER,
	`percent` FLOAT,
	PRIMARY KEY (`id`),
	INDEX `I_referenced_hour_FK_4_1` (`version`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_profile_FI_2` (`created_by`),
	CONSTRAINT `sf_guard_user_profile_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
