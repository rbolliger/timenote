
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
#-- timenote_entry
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timenote_entry`;


CREATE TABLE `timenote_entry`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`project_id` INTEGER  NOT NULL,
	`type_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`start_dt` DATETIME,
	`end_dt` DATETIME,
	`comment` VARCHAR(255)  NOT NULL,
	`percent` DECIMAL,
	PRIMARY KEY (`id`),
	INDEX `timenote_entry_FI_1` (`project_id`),
	CONSTRAINT `timenote_entry_FK_1`
		FOREIGN KEY (`project_id`)
		REFERENCES `timenote_project` (`id`),
	INDEX `timenote_entry_FI_2` (`type_id`),
	CONSTRAINT `timenote_entry_FK_2`
		FOREIGN KEY (`type_id`)
		REFERENCES `timenote_type` (`id`),
	INDEX `timenote_entry_FI_3` (`user_id`),
	CONSTRAINT `timenote_entry_FK_3`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
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
	PRIMARY KEY (`id`),
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
