<?php 

?>

<form action="" method="POST" id='form' hx-target='this'>
  <div class="input_container" >
    <label for="name"></label>
    <input type="text" name="name" id="name" placeholder="Nom">
  </div>
  <div class="textarea_container" >
    <label for="message"></label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
  </div>
  <div id='action_button_container' >
    <button id="add_button" >add </button>
    <button id="exit_button" hx-get='/' hx-headers='{"HShow": "false"}' hx-swap='outerHTML' hx-select='#show_form_button' >exit</button>
  </div>
</form>

