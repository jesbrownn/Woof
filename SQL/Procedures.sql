delimiter //

CREATE PROCEDURE nextMatch(IN acNum int, OUT onum int)
BEGIN
	SELECT accountNum INTO onum
    FROM Accounts
    WHERE accountNum != acNum AND accountNum NOT IN (
		SELECT swiped
        FROM RightSwipes
        WHERE swiper = acNum
    )
    ORDER BY RAND()
    LIMIT 1;
END//

CREATE PROCEDURE getProfile(IN acNum int, OUT oname varchar(40), OUT obreed varchar(40), OUT obio varchar(500), OUT oage int, OUT opicture blob)
BEGIN
	SELECT name, breed, bio, age, picture INTO oname, obreed, obio, oage, opicture
    FROM Accounts
    WHERE accountNum = acNum;
END//

CREATE PROCEDURE createAccount(IN tok char(255), IN email varchar(40), IN password char(255))
BEGIN
	INSERT INTO Accounts (token, email, pass)
    value (tok, email, password);
END//

CREATE PROCEDURE modifyProfile(IN acNum int, IN name varchar(40), IN breed varchar(40), IN bio varchar(500), IN age int, IN picture blob)
BEGIN
    IF name is not null THEN
		UPDATE Accounts
		SET Accounts.name = name
        WHERE acNum = Accounts.accountNum;
	END IF;
    IF breed is not null THEN
		UPDATE Accounts
        SET Accounts.breed = breed
        WHERE acNum = Accounts.accountNum;
	END IF;
    IF bio is not null THEN
		UPDATE Accounts
        SET Accounts.bio = bio
        WHERE acNum = Accounts.accountNum;
	END IF;
    IF age is not null THEN
		UPDATE Accounts
        SET Accounts.age = age
        WHERE acNum = Accounts.accountNum;
    END IF;
    IF picture is not null THEN
		UPDATE Accounts
        SET Accounts.picture = picture
        WHERE acNum = Accounts.accountNum;
    END IF;
END//

delimiter ;