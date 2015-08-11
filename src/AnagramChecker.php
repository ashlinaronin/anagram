<?php

    class AnagramChecker
    {
        function checkAnagram($input_word, $guess_array)
        {
            $output_array = array();

            foreach ($guess_array as $word) {

                if ($word != $input_word) {
                    $input_word_array = str_split($input_word);
                    $letter_array = str_split($word);
                    foreach($letter_array as $letter) {
                        if (in_array($letter, $input_word_array)) {
                            $key_of_input_letter = array_search($letter, $input_word_array);
                            unset($input_word_array[$key_of_input_letter]);
                        }
                    }

                    /* if the input word array is empty after looping through all
                     letters of the word to test, then that word is an anagram
                     and we should add it to the list. */
                    if (empty($input_word_array)) {
                        array_push($output_array, $word);
                    }
                }
            }

            return $output_array;

        }
    }
?>
