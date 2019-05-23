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


INSERT INTO Regions(RegionName, RegionData)
	VALUES('North America', 'Canada, The United States, & Mexico');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('South America', 'Brazil, Argentina, Chile, Venezuela, etc.');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Western Europe', 'The UK, France, Germany, Spain, etc.');

INSERT INTO Regions(RegionName, RegionData)
	VALUES('Eastern Europe', 'Estonia, Lithuania, Latvia, Ukraine, Romania, etc');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Africa', 'Egypt, Nigeria, Zimbabwe, South Africa, Madagascar, etc.');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('The Middle East', 'Iran, Iraq, Syria, Saudi Arabia, Pakistan, Afghanistan, etc.');

INSERT INTO Regions(RegionName, RegionData)
	VALUES('South East Asia', 'India, China, Thailand, Singapore, Vietman, etc');
        
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Oceania', 'Indonesia, The Philippines, & Papua New Guinea');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Australia', 'Australia & New Zealand');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Russia', 'Russia is really big!');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('North East Asia', 'Japan, North Korea, & South Korea');
    
INSERT INTO Regions(RegionName, RegionData)
	VALUES('Antarctica', 'Nothing is really in Antarctica.');
    

INSERT INTO RegionJoin(UserId, RegionId)
	VALUES((SELECT UserId FROM Users WHERE UserName = 'George Wieland'),
		   (SELECT RegionId FROM Regions WHERE RegionName = 'North America'));
		