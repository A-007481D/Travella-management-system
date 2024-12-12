


CREATE DATABASE Voyage;

CREATE TABLE Client (
    ClientID INT(11) AUTO_INCREMENT,
    First_name VARCHAR(100),
    Last_name VARCHAR(100),
    Email VARCHAR(150),
    Telephone VARCHAR(150),
    Address TEXT,
    Birth_date DATE,
    PRIMARY KEY (ClientID)
);

CREATE TABLE Activity (
    ActivityID INT(11) AUTO_INCREMENT,
    Title VARCHAR(100),
    Description text,
    Destination VARCHAR(100),
    Price DECIMAL(10,2),
    Start_date DATE,
    End_date DATE ,
    Places_available INT(11),
    PRIMARY KEY (ActivityID)
);

CREATE TABLE Reservation (
    ReservationID INT(11) AUTO_INCREMENT,
    ClientID INT(11),
    ActivityID INT(11),
    Reservation_date TIMESTAMP,
    Status ENUM('Waiting', 'Confirmed','Cancelled')
    PRIMARY KEY (ReservationID),
    FOREIGN KEY (ClientID) REFERENCES ClientID(ClientID) ON DELETE CASCADE,
    FOREIGN KEY (ActivityID) REFERENCES Activity(ActivityID) ON DELETE CASCADE,
);

INSERT INTO Client (First_name, Last_name, Email, Telephone, Address, Birth_date) VALUES ('value1', 'value2'...);

INSERT INTO Reservation (`ReservationID`, `ClientID`, `ActivityID`, `Reservation_date`, `Status`) 
VALUES (NULL, 1, 2, '2024-12-15', 'ongoing');


UPDATE Client
SET Address='fake address' WHERE ClientID=26;

UPDATE Activity
SET Description='new description', Title = 'new name' WHERE ActivityID=3;

UPDATE Activity
SET Name = 'Mountain Hiking', Description = 'A thrilling mountain hike for adventure seekers.', Price = 50.00
WHERE ActivityID = 2;


UPDATE Reservation
SET Status='checked out', Reservation_date='2024/02/07'
WHERE ActivityID=3;


DELETE FROM Reservation
WHERE ReservationID = 5;

DELETE FROM reservation;



SELECT Client.First_name, 
       Client.Last_name, 
       Activity.Name AS Activity_Name, 
       Activity.Description, 
       Reservation.Reservation_date, 
       Reservation.Status
    FROM reservation
    JOIN client ON Reservation.ClientID = client.ClientID
    JOIN activity ON Reservation.ActivityID = activity.ActivityID WHERE client.ClientID = 1;


