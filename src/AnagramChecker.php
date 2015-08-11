<?php

    class AnagramChecker
    {
        function checkAnagram($input_word, $guess_array)
        {
            $output_array = array();

            foreach ($guess_array as $word) {

                if ($word != $input_word) {
                    // Count which letter of guess we are on to determine partial matches
                    $guess_letter_counter = 0;

                    //split input word and guess array words into seperate arrays to compare letter by letter
                    $input_word_array = str_split($input_word);
                    $letter_array = str_split($word);

                    /*loop through each letter of guess and compares with each letter of input word
                    if match is found, delete letter from input word array, increment counter to
                    determine if partial guess has been fulfilled */
                    foreach($letter_array as $letter) {
                        if (in_array($letter, $input_word_array)) {
                            $key_of_input_letter = array_search($letter, $input_word_array);
                            unset($input_word_array[$key_of_input_letter]);
                            $guess_letter_counter++;
                        }
                    }

                    /* if the input word array is empty after looping through all
                     letters of the word to test, then that word is an anagram
                     and we should add it to the list. checks if partial guess has been found
                     by comparing number of letters in guess with number of letters found*/
                    if (empty($input_word_array) || ($guess_letter_counter == strlen($word))) {
                        array_push($output_array, $word);
                    }
                }
            }

            return $output_array;

        }
    }
?>
