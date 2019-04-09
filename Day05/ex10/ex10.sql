SELECT `film`.`title` AS `Title`, `film`.`summary` AS `Summary`, `film`.`prod_year`
FROM film, genre
WHERE `genre`.`name` = 'erotic' AND `film`.`id_genre` = `genre`.`id_genre`
ORDER BY prod_year DESC;
