<?php 

function getPrix($prix)
{
    $prix=floatval($prix);
    return number_format($prix, 2, '.', ' '). 'CFA';
}

function getMontant($prix)
{
    $prix=floatval($prix);
    return number_format($prix, 2, '.', ' ');
}