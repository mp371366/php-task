<?php

function shuffle_word(string $word): string {
  $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
  $first_letter = array_shift($letters);
  $last_letter = array_pop($letters);
  shuffle($letters);
  array_unshift($letters, $first_letter);
  array_push($letters, $last_letter);
  return implode($letters);
}

function shuffle_text(string $text): string {
  preg_match_all('/(\p{L}*)([^\p{L}]*)/mu', $text, $matches);
  list($all, $words, $separators) = $matches;
  $shuffled_words = array_map('shuffle_word', $words);
  $zipped_words_and_separators = array_map(null, $shuffled_words, $separators);
  $joined_words_and_separators = array_map('implode', $zipped_words_and_separators);
  return implode($joined_words_and_separators);
}

$file = fopen("file.txt", "r") or die("Unable to open file!");
$text = fread($file, filesize("file.txt"));
fclose($file);

$new_file = fopen("file_copy.txt", "w") or die("Unable to open file!"); 
fwrite($new_file, shuffle_text($text));
fclose($new_file);

?>