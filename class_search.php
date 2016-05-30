<?php

class search {
  
  private $mysqli;
  
  public function __construct() {
    // Connect to our database and store in $mysqli property
    $this->connect();
  }
  /**
   * Database connection
  */
  private function connect() {
    $this->mysqli = new mysqli( 'localhost', 'root', '', 'bookingform' );
  }
  
  public function search($search_term) {
    // Sanitize the search term to prevent injection attacks
    $sanitized = $this->mysqli->real_escape_string($search_term);
    
    // Run the query
    $query = $this->mysqli->query("
      SELECT username
      FROM bookingform
      WHERE username LIKE '%{$sanitized}%'
      ");
    
    // Check results
    if ( ! $query->num_rows ) {
      return false;
    }
    
    // Loop and fetch objects
    while( $row = $query->fetch_object() ) {
      $rows[] = $row;
    }
    
    // Build our return result
    $search_results = array(
      'count' => $query->num_rows,
      'results' => $rows,
    );
    
    return $search_results;
  }
}