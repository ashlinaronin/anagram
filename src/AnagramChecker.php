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

                    $input_word_array = str_split($input_word);
                    $letter_array = str_split($word);
                    foreach($letter_array as $letter) {
                        if (in_array($letter, $input_word_array)) {
                            $key_of_input_letter = array_search($letter, $input_word_array);
                            unset($input_word_array[$key_of_input_letter]);
                            $guess_letter_counter++;
                        }
                    }

                    /* if the input word array is empty after looping through all
                     letters of the word to test, then that word is an anagram
                     and we should add it to the list. */
                    if (empty($input_word_array) || ($guess_letter_counter == strlen($word))) {
                        array_push($output_array, $word);
                    }
                }
            }

            return $output_array;

        }
    }
?>
