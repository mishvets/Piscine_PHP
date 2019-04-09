SELECT `genre`.`id_genre` AS `id_genre`, `genre`.`name` AS `name_genre`, `id_distrib` AS `id_distrib`, `distrib`.`name` AS `name_distrib`, `title` AS `title_film`
FROM `genre` LEFT JOIN `film` USING (`id_genre`) LEFT JOIN `distrib` USING (`id_distrib`)
WHERE `genre`.`id_genre` BETWEEN 4 AND 8;