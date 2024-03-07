<?php 

/* sleep(2) */

dump($_GET);

if(!empty($_GET)) {

  $status=isset($_GET['status'])?1:0;


}

?>

<p>okok</p>

<!-- <form action="" method="POST" id='form' hx-target='this'>
  <div class="input_container" >
    <label for="name"></label>
    <input type="text" name="name" id="name" placeholder="Nom">
  </div>
  <div class="textarea_container" >
    <label for="message"></label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
  </div>
  <div id='action_button_container' >
    <button id="add_button" hx-post='/add' hx-target='this' >add </button>
    <button id="exit_button" hx-get='/' hx-swap='outerHTML' hx-select='#show_form_button' >exit</button>
  </div>
</form>
 -->
