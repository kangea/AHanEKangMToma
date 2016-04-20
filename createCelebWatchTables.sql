# Write an SQL statement to create 'Users' table.

CREATE TABLE Users (
  UserName VARCHAR(50) NOT NULL PRIMARY KEY,
  Password VARCHAR(20) NOT NULL,
  Email VARCHAR(50) NOT NULL,
);

-- Write an SQL statement to create 'Celebrities' table.
CREATE TABLE Celebrities (
	CelebName VARCHAR(100) NOT NULL PRIMARY KEY,
	Birthday DATE NOT NULL,
	Facebook VARCHAR(500) NOT NULL,
	Twitter VARCHAR(500) NOT NULL,
	Instagram VARCHAR(500) NOT NULL
);

-- Write an SQL state to create 'Requests' table.
CREATE TABLE Requests (
	Celeb VARCHAR(100) NOT NULL,
	User VARCHAR(50) NOT NULL,
	RequestTime DATETIME NOT NULL,
	Descrp VARCHAR(500) NOT NULL,
	FOREIGN KEY (User) REFERENCES Users(Email)
) engine=InnoDB;
-- didn't requre engine=InnoDB on phpmyadmin

-- Write an SQL statement to create 'MyCelebs' table.
CREATE TABLE MyCelebs (
	CelebName VARCHAR(100) NOT NULL,
	UserEmail VARCHAR(50) NOT NULL,
	FOREIGN KEY (CelebName) REFERENCES Celebrities(CelebName),
	FOREIGN KEY (UserEmail) REFERENCES Users(Email)
) engine=InnoDB;


