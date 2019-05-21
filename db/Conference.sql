CREATE TABLE Users
( 
    UserId INT PRIMARY KEY,
    UserName VARCHAR(32) 
);

CREATE TABLE Conferences
(
    ConferenceId INT PRIMARY KEY,
    ConferenceDate DATE
);

CREATE TABLE Speakers
(
    SpeakerId INT PRIMARY KEY,
    SpeakerFirstName VARCHAR(32),
    SpeakerMiddleName VARCHAR(32),
    SpeakerLastName VARCHAR(32)
);

CREATE TABLE Notes
(
    NotesId INT PRIMARY KEY,
    DateTaken DATE, 
    UserId INT,
    SpeakerId INT,
    ConferenceId INT,
    NoteData TEXT,

    BeatsPerMinute INT,
    --System_User_Lab Garbage_Lab,

    FOREIGN KEY (SpeakerId) REFERENCES Speakers(SpeakerId),
    FOREIGN KEY (ConferenceId) REFERENCES Conferences(ConferenceId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
    
);