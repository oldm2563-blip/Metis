CREATE DATABASE metis;

USE metis;

CREATE TABLE members(
    ->member_id int PRIMARY KEY AUTO_INCREMENT,
    ->full_name varchar(255),
    ->email varchar(255) UNIQUE,
    ->phone varchar(20)
);

CREATE TABLE projects(
    ->project_id int PRIMARY KEY AUTO_INCREMENT,
    ->project_name varchar(255),
    ->project_type enum("shortproject", "longproject"),
    ->member_id int,
    ->FOREIGN KEY (member_id) REFERENCES members (member_id)
);

CREATE TABLE activities(
    activity_id int PRIMARY KEY AUTO_INCREMENT,
    activity_name varchar(255),
    project_id int,
    FOREIGN KEY (project_id) REFERENCES projects(project_id);
)