CREATE TABLE students (
	student_id INT NOT NULL AUTO_INCREMENT,
	bluegold_id VARCHAR(8) NOT NULL,
	name VARCHAR(255) NOT NULL,
	address VARCHAR(255) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	gpa DECIMAL(3,2) NOT NULL,
	total_credit INT NOT NULL,
	PRIMARY KEY (student_id),
	UNIQUE (bluegold_id)
);

CREATE TABLE logins (
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role ENUM('student', 'faculty') NOT NULL,
	PRIMARY KEY (username));
