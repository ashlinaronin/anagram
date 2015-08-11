<?php

    require_once "src/AnagramChecker.php";

    class AnagramCheckerTest extends PHPUnit_Framework_TestCase
    {

        function test_checkAnagram_twoLetters()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "ab";
            $guess_array = array("ba");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("ba"), $result);

        }

        function test_checkAnagram_threeLetter()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "bat";
            $guess_array = array("tab");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("tab"), $result);
        }

        function test_checkAnagram_someIncorrect()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "bat";
            $guess_array = array("tub", "bit", "butt", "bet", "tab");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("tab"), $result);
        }
    }
?>
