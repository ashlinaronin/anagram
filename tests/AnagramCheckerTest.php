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

        function test_checkAnagram_noCorrect()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "bat";
            $guess_array = array("butt", "boof", "barrel");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array(), $result);
        }

        function test_checkAnagram_noInput()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "";
            $guess_array = array();

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array(), $result);
        }

        function test_checkAnagram_nonLetter()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "ca%h1";
            $guess_array = array("l33t", "n00bz0r", "%1cah");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("%1cah"), $result);
        }

        function test_checkAnagram_noGuesses()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "bif";
            $guess_array = array();

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array(), $result);
        }

        function test_checkAnagram_noInputWord()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "";
            $guess_array = array("share", "care", "bear", "wear");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array(), $result);
        }

        function test_checkAnagram_originalWord()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "bat";
            $guess_array = array("bat", "but", "brr", "tab");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("tab"), $result);
        }

        function test_checkAnagram_partialMatch()
        {
            //Arrange
            $test_AnagramChecker = new AnagramChecker;
            $input_word = "hamster";
            $guess_array = array("ham", "tram", "rest", "meats", "mcchicken", "bogey");

            //Act
            $result = $test_AnagramChecker->checkAnagram($input_word, $guess_array);

            //Assert
            $this->assertEquals(array("ham", "tram", "rest", "meats"), $result);
        }
    }
?>
