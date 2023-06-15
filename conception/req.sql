SELECT *
FROM posts A
WHERE active=true
  AND 
    (A.title LIKE '%abc%'
      OR content LIKE '%abc%')

exo 4
SELECT * FROM player ORDER BY nickname

SELECT * FROM game ORDER BY title

SELECT title, COUNT(C.id) AS 'Nb players', start_date, nickname
FROM contest C
INNER JOIN game G
  ON id_game = G.id
LEFT JOIN player P
  ON id_player = P.id
INNER JOIN play PL
  ON PL.id = C.id
GROUP BY C.id
ORDER BY start_date DESC

SELECT C.id, email, nickname
FROM contest C
INNER JOIN play P
  ON P.id = C.id
INNER JOIN player PL
  ON P.id_player = PL.id
WHERE C.id = 2

INSERT INTO play (id, id_player) VALUES (2, 1);

