<?php
namespace core;

class Validator {
  public static function string($value, $min=1, $max=INF): bool {
    $value = trim($value);
    return strlen($value) >= $min && strlen($value) <= $max;
  }

  // Method to validate email addresses
  public static function email(string $value): bool {
    // Trim the value to remove any extra spaces
    $value = trim($value);

    // Check if the email address has a valid format
    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }
}
