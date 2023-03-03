<?php

class ExchangeRate
{
  private string $exchange_rates_cache_folder;
  private string $exchange_rates_url;  // Url to get data from
  private string $exchange_rates_time;  // Exchange rates valid time
  private array $exchange_rates;  // Arr to store all exchange rates
  private string $exchange_rates_cache_file = "cached_rates.xml";  // File with cached exchange rates

  public function __construct()
  {
    $this->exchange_rates_url = "https://www.ecb.int/stats/eurofxref/eurofxref-daily.xml";
    $this->exchange_rates_cache_folder = dirname(__FILE__);  // Setting path to current folder

    // Getting data
    $this->get_exchange_rates();
  }

  // Converting currency
  public function convert_currency(string $to, $from = "USD", $amount = 1): int|float
  {
    // Special case(because of European Central Bank data)
    if ($to == "EUR") {
      if ($this->exchange_rates[$from] == 0 or $this->exchange_rates[$to] == 0) {
        echo "Unable to convert. Please, set currency";
        return 0;
      }
      $res = $amount * (1 / $this->exchange_rates[$from]) / $this->exchange_rates[$to];
    } else {
      if ($this->exchange_rates[$from] == 0) {
        return 0;
      }
      $res = $amount * $this->exchange_rates[$to] / $this->exchange_rates[$from];
    }
    return $res;
  }

  // Fetching exchange rates from ECB
  private function get_exchange_rates(): void
  {
    $current_time = time();
    $cache = $this->exchange_rates_cache_folder . "/" . $this->exchange_rates_cache_file;  // Cache location
    $this->exchange_rates["EUR"] = 1.00;

    // Checking if there is recent exchange rates cache
    if (file_exists($cache)) {
      $interval = $current_time - filemtime($cache);  // Cache time interval
      // If cache file doesn't exist or cache is expired
      if ($interval > 0 or !file_exists($cache)) {
        $new_cache = file($this->exchange_rates_url);
        if (is_writable($cache)) {
          $opened_cache = fopen($cache, "w+");
          foreach ($new_cache as $row) {
            // Putting data
            fputs($opened_cache, $row);
          }
        } else {
          die("File is not writable. Please, check folder permissions");
        }
      } else {
        $new_cache = file($cache);
      }

      // Extracting exchange rates
      foreach ($new_cache as $row) {
        // Time regex
        if (preg_match("/time='([[:graph:]]+)'/", $row, $got_time)) {
          $this->exchange_rates_time = $got_time[1];
        }
        // Currency name regex
        preg_match("/currency='([[:alpha:]]+)'/", $row, $got_currency);
        // Rate regex
        if (preg_match("/rate='([[:graph:]]+)'/", $row, $got_rate)) {
          $this->exchange_rates[$got_currency[1]] = $got_rate[1];  // Filling arr with currency-rate pairs
        }
      }
    }
  }

  public function get_exchange_rates_time(): string
  {
    return $this->exchange_rates_time;
  }

  public function get_exchange_rates_url(): string
  {
    return $this->exchange_rates_url;
  }
}
