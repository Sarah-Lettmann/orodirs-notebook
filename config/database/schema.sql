CREATE DATABASE orodirsNotebook;

USE orodirsNotebook;

CREATE TABLE users (
	username VARCHAR(64),
	fullName VARCHAR(128),
	emailAddress VARCHAR(128) UNIQUE,
	profileImageURL VARCHAR(512),
	locked INTEGER(1) NOT NULL DEFAULT 0,
	pwdReset INTEGER(1) NOT NULL DEFAULT 0,
	password VARCHAR(128) NOT NULL,
	PRIMARY KEY (username)
);

CREATE TABLE roles (
	rolename VARCHAR(64),
	PRIMARY KEY (rolename)
);

CREATE TABLE campaigns (
	campaignID INTEGER(32) AUTO_INCREMENT,
	owner VARCHAR(64) NOT NULL,
	campaignName VARCHAR(128) UNIQUE NOT NULL,
	shortDescription VARCHAR(1024),
	PRIMARY KEY (campaignID),
	FOREIGN KEY (owner) REFERENCES users(username)
);

CREATE TABLE roleAssignments (
	assignmentID INTEGER(32) AUTO_INCREMENT,
	username VARCHAR(64) NOT NULL,
	rolename VARCHAR(64) NOT NULL,
	PRIMARY KEY (assignmentID),
	FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (rolename) REFERENCES roles(rolename)
);

CREATE TABLE assignmentCampaigns (
	assignment INTEGER(32),
	campaign INTEGER(32),
	CONSTRAINT assignmentCampaignsPK PRIMARY KEY (assignment, campaign)
);

GRANT ALL PRIVILEGES ON orodirsNotebook.* TO 'orodir'@'localhost' IDENTIFIED
	BY 'krakataua';

INSERT INTO users(username, fullName, password) VALUES ('admin',
	'The Administrator', SHA2('admin', 512));

INSERT INTO roles (rolename) VALUES ('admin');

INSERT INTO roleAssignments (username, rolename) VALUES ('admin', 'admin');
