<?php
//echo 'silence';
?>
<div class="container">
  <h3>Add New Store</h3>
  <form action="/action_page.php">
    <div class="form-group">
      <label><strong>Store Title :</strong></label>
      <textarea class="form-control" rows="4" id="store_title" name="store_title" placeholder="Enter store title here..." required></textarea>
    </div>
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#location">Location</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#opening_hours">Opening Hours</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#additional_informations">Additional Informations</a>
    </li>
  </ul>

   <!-- Tab panes -->
   <div class="tab-content">
    <div id="location" class="container tab-pane active"><br>
      <h3>Location</h3>
      
      <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" name="adddress">
    </div>
    <div class="form-group">
      <label for="address2">Address2:</label>
      <input type="text" class="form-control" id="address2" name="adddress2">
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>
     <div class="form-group">
      <label for="state">State:</label>
      <input type="text" class="form-control" id="state" name="state">
    </div>
     <div class="form-group">
      <label for="zip_code">Zip Code:</label>
      <input type="text" class="form-control" id="zip_code" name="zip_code">
    </div>
    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" class="form-control" id="country" name="country">
    </div>
    <div class="form-group">
      <label for="latitude">Latitude:</label>
      <input type="text" class="form-control" id="latitude" name="latitude">
    </div>
    <div class="form-group">
      <label for="longitude">Longitude:</label>
      <input type="text" class="form-control" id="longitude" name="longitude">
    </div>

    </div>
    <div id="opening_hours" class="container tab-pane fade"><br>
      <h3>Opening Hours</h3>
      <div class="form-group">
              <label for="monday"><strong>Monday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="monday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="monday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="tuesday"><strong>Tuesday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="tuesday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="tuesday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="wednesday"><strong>Wednesday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="wednesday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="wednesday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="thruesday"><strong>Thruesday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="thruesday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="thruesday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="friday"><strong>Friday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="friday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="friday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="saturday"><strong>Saturday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="saturday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="saturday_close">
            </div>
    </div>
    <div class="form-group">
              <label for="sunday"><strong>Friday:</strong></label>
              <div class="row">
            <div class="col">
                <label>Opening Time :</label>
                <input type="time" class="form-control" name="sunday_open">
            </div>
            <div class="col">
                <label>Closing Time :</label>
                <input type="time" class="form-control" name="sunday_close">
            </div>
    </div>

    <div id="additional_informations" class="container tab-pane fade"><br>
      <h3>Additional Informations</h3>
      <div class="form-group">
      <label for="tel">Tel:</label>
      <input type="number" class="form-control" id="tel" name="tel">
    </div>
    <div class="form-group">
      <label for="fax">Fax:</label>
      <input type="text" class="form-control" id="fax" name="fax">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="url">URL:</label>
      <input type="text" class="form-control" id="url" name="url">
    </div>
    </div>
  </div>

  
    <button type="submit" class="btn btn-primary">Save Store Data</button>
  </form>
</div>