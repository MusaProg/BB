USE Test_BD;
/*
1.
SELECT COUNT(fId) 
FROM Chessboard;
*/

/*
2.
SELECT fType
FROM Chessmen
WHERE fType LIKE 'k%';
*/

/*
3.
SELECT fType,
COUNT (fId) AS CNT
FROM Chessmen
GROUP BY fType;
*/

/*
4.
SELECT Chessboard.fId
FROM Chessboard
JOIN  Chessmen ON Chessboard.fId = Chessmen.fId
WHERE Chessmen.fColor = 'white';
*/

/*
5.
SELECT fType, fColor
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE unicode(Chessboard.x)-64 = Chessboard.y
GROUP BY fType, fColor;
*/

/*
6.
SELECT fColor, COUNT(Chessmen.fId)
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
GROUP BY fColor;
*/
/*
7.
SELECT fType
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE fColor = 'black'
GROUP BY fType;
*/
/*
8.
SELECT fType, COUNT (Chessmen.fId)
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE fColor = 'black'
GROUP BY fType;
*/

/*
9.
SELECT fType
FROM Chessmen JOIN Chessboard ON Chessboard.fId = Chessmen.fId
GROUP BY fType HAVING COUNT(*) >= 2;
*/
/*
10.
SELECT TOP 1 fColor, COUNT(Chessmen.fId) AS CNT
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
GROUP BY fColor
ORDER BY CNT;
*/

/*
11.
SELECT fType, Chessmen.fId
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE x IN
(
SELECT x
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE fType = 'rook'
)
OR y IN
(
SELECT y
FROM Chessmen JOIN Chessboard ON Chessmen.fId = Chessboard.fId
WHERE fType = 'rook'
)
*/