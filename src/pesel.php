<?php

function is_leap_year(int $year): bool {
  return $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0);
}

function days_in_month_by_year(int $year, int $month): int {
  if ($month == 2 && is_leap_year($year)) return 29;
  return array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)[$month - 1];
}

function validate_date(int $year, int $month, int $day): bool {
  if ($month < 1 || $month > 12) return false;
  if ($day < 1 || $day > days_in_month_by_year($year, $month)) return false;
  return true;
}

function validate_pesel(string $pesel): bool {
  $regex = '/^([\d]{2})([\d]{2})([\d]{2})([\d]{4})([\d]{1})$/';
  if (!preg_match($regex, $pesel, $matches)) return false;
  
  list($all, $year, $month, $day, $number, $control) = $matches;
  $year = intval($year);
  $month = intval($month) % 20;
  $day = intval($day);
  if (!validate_date($year, $month, $day)) return false;
  
  $digits = array_map('intval', str_split($pesel));
  $weights = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3, 1);
  $products = array_map(function ($digit, $weight) { return $digit * $weight; }, $digits, $weights);
  $control_number = array_sum($products);
  if ($control_number % 10 != 0) return false;

  return true;
}

?>