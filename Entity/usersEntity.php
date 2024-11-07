<?php 
 function getExtrait(){
    $html = '<p>' . substr($this->contenu, 0, 80) . '...</p>';
    $html .= '<p><a href="' .$this->getUrl() .'">Voir plus</a></p>';
    return $html;
}