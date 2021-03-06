<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/AnagramChecker.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //Routes
    $app->get("/", function() use ($app) {
        return $app['twig']->render('anagram_input.html.twig');
    });

    $app->get("/anagrams", function() use($app) {
        // If user did not input any guesses, send empty array to checker method.
        if (empty($_GET['guesses'])) {
            $guesses_array = array();
        } else {
            $guesses_array = explode(" ", $_GET['guesses']);
        }

        $new_AnagramChecker = new AnagramChecker;
        $results_array = $new_AnagramChecker->checkAnagram($_GET['input_word'], $guesses_array);
        return $app['twig']->render('anagrams.html.twig', array('results' => $results_array));
    });

    return $app;

?>
