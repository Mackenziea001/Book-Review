<?php 
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Book Buy";
 
// include login checker
$require_login=true;
include_once "login_checker.php";
 
   // include page header HTML
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";


error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging


$search= $_POST['search_entered'];

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'Mackenzi-BookRevi-PRD-75f77d67c-5fc5f368';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = "$search";  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=10";


// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $price=  $item->sellingStatus->currentPrice;
    $shippingprice= $item->shippingInfo->shippingServiceCost;

$price= (float)$price;

$shippingprice= (float)$shippingprice;

$shippingprice= number_format($shippingprice, 2);


$totalprice= $price +$shippingprice;

$totalprice= (float)$totalprice;

$totalprice= number_format($totalprice, 2);


    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<tr>
<td><img src=\"$pic\"></td>
<td><a href=\"$link\"   target='_blank' >$title</a></td>
<td>Price: $$price</td>
</tr>";
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}

?>

    <div id="search" class="header">
           <form action="Ebay-search-by-keywords.php" method="POST"><br>
Search for books
<input type="text" name="search_entered" autocomplete="off" />
<input type="submit" name="submit" value="Submit"/><br>
</form>

            </div>
<div>
<h3>Search Results for <?php echo $query; ?></h3>

<table>
<tr>
  <td>
    <?php echo $results;?>
  </td>
</tr>
</table>
    </div>
<?php
 include "layout_foot.php";
?>