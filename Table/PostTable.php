<?php
require 'Database/Table.php';

$table = 'articles';

function last() {
    return query(
        "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY articles.date DESC");
}