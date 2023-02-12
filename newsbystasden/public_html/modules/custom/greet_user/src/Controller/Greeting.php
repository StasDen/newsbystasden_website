<?php

namespace Drupal\greet_user\Controller;
// Note: php namespaces work similar to java packages

// Main class(set in routing file)
class Greeting
{
  // Main method(set in routing file)
  public function greet_user(): array
  {
    // Note 1: controller method always returns an array
    return array("#markup" => "Hello, User!");  // Note 2: symbol "#" is usually required
  }
}
