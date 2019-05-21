CREATE TABLE Users
( 
    UserId SERIAL PRIMARY KEY,
    UserName VARCHAR(32)
);

CREATE TABLE Holidays
( 
    HolidayId SERIAL PRIMARY KEY,
    HolidayName VARCHAR(32),
    HolidayData VARCHAR(100)    
);

CREATE TABLE Regions
( 
    RegionId SERIAL PRIMARY KEY,
    RegionName VARCHAR(32),
    RegionData VARCHAR(100)
);

CREATE TABLE HolidayJoin
( 
    JoinId SERIAL PRIMARY KEY,
    RegionId INT,
    HolidayId INT,
    
    FOREIGN KEY (HolidayId) REFERENCES Holidays(HolidayId),
    FOREIGN KEY (RegionId) REFERENCES Regions(RegionId)
);

CREATE TABLE RegionJoin
( 
    JoinId SERIAL PRIMARY KEY,
    UserId INT,
    RegionId INT,
    
    FOREIGN KEY (UserId) REFERENCES Users(UserId),
    FOREIGN KEY (RegionId) REFERENCES Regions(RegionId)
);



INSERT INTO Users (UserName) 
	VALUES('George Wieland');