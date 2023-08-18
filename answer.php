<!-- /*
 * Dans ce travail, vous devez créer faire en sorte de créer une pseudo-calculatrice.
 * À partir du formulaire de la page index.php, vous devez, une fois le formulaire soumis,
 * faire en sorte que la somme s'affiche à l'écran, en récupérant la valeur des champs qui
 * seront soumis.
 *
 * Pour ce travail, vous devrez peut-être utiliser les fonctions suivante:
 * $_POST (https://www.php.net/manual/fr/reserved.variables.post.php)
 * switch (https://www.php.net/manual/fr/control-structures.switch.php)
 *
 +-----------------------------------------------------------------------------+
|                 Critères d'évaluation pour l'exercice                        |
+----+-------------------------------------------------------------------------+
| #  | Critère                                                                 |
+----+-------------------------------------------------------------------------+
|  1 | Récupération des valeurs des champs (25%)                               |
|    | - Récupération correcte des valeurs entrées par l'utilisateur           |
|    | - Validation des valeurs pour s'assurer qu'elles sont numériques        |
+----+-------------------------------------------------------------------------+
|  3 | Calcul de la somme des champs (25%)                                     |
|    | - Addition correcte des valeurs des champs                              |
|    | - Précision et absence d'erreurs dans le calcul de la somme             |
+----+-------------------------------------------------------------------------+
|  4 | Affichage du résultat (25%)                                             |
|    | - Affichage correct du résultat de la somme à l'utilisateur             |
|    | - Format d'affichage approprié                                          |
+----+-------------------------------------------------------------------------+
|  6 | Utilisation de bonnes pratiques de programmation  (15%)                 |
|    | - Structure lisible et compréhensible du code                           |
|    | - Noms de variables et de fonctions descriptifs et cohérents            |
|    | - Utilisation de commentaires lorsque nécessaire                        |
+----+-------------------------------------------------------------------------+
|  8 | Test et validation  (10%)                                               |
|    | - Test du script avec différentes valeurs pour vérifier sa précision    |
|    | - Fonctionnement sans erreurs et respect des exigences spécifiées       |
+----+-------------------------------------------------------------------------+
Bonne chance!
 */ -->



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Recupere les donnees du formulaires
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT);
    $operator = htmlspecialchars($_POST['func']);

    //Gestion des erreurs
    if(empty($num1) || empty($num2) || empty($operator)) {
        $error = 'Tous les champs sont requis';
        header("Location: index.php?error=" . urlencode($error));
        exit;
    }

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = 'Valeur numérique seulement';
        header("Location: index.php?error=" . urlencode($error));
        exit;
    }

    //Calcul
    switch ($operator) {
        case "+":
            $value = $num1 + $num2;
            break;
        case "-":
            $value = $num1 - $num2;
            break;
        case "*":
            $value = $num1 * $num2;
            break;
        case "/":
            $value = $num1 / $num2;
            break;
    }

    header("Location: index.php?result=" . $value);

}

?>