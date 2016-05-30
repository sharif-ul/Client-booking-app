<?php
//Check if search data was submitted
if ( isset( $_GET['s'] ) ) {
  // Include the search class
  require_once('class_search.php');
  
  // Instantiate a new instance of the search class
  $search = new search();
  
  // Store search term into a variable
  $search_term = $_GET['s'];
  
  // Send the search term to our search class and store the result
  $search_results = $search->search($search_term);
}
?>

<?php if ( $search_results ) : ?>
    <div class="results-count">
      <p><?php echo $search_results['count']; ?> results found</p>
    </div>
    <div class="results-table">
      <?php foreach ( $search_results['results'] as $search_result ) : ?>
      <div class="result">
        <p><?php echo $search_result->username; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    
    <?php endif; ?>

