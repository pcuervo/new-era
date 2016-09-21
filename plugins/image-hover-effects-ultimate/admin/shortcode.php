<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Added Shortcode with ID
add_filter( 'manage_iheb-oxi-hov_posts_columns', 'iheb_oxi_hov_add_id_column', 10 );
add_action( 'manage_iheb-oxi-hov_posts_custom_column', 'iheb_oxi_hov_id_column_content', 10, 2 );

function iheb_oxi_hov_add_id_column( $ihebcat ) {
   $ihebcat['iheb-oxi-hov'] = 'Image Hover Shortcode';
   return $ihebcat;
}

function iheb_oxi_hov_id_column_content( $ihebcat, $id ) {
  if( 'iheb-oxi-hov' == $ihebcat ) {
     $shortcode_massage ='[iheb_oxi_hover id="'.$id.'"]';
     
    echo '<input style="min-width:210px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$shortcode_massage.'\' /> ';   
  }
}

// Gallery custom messages
add_filter( 'post_updated_messages', 'iheb_oxi_hov_updated_messages' );
function iheb_oxi_hov_updated_messages( $imagemessages ){
        
    global $post;
    $post_ID = get_the_ID();
	  
 $imagemessages['iheb-oxi-hov'] = array(
            0 => '', 
            1 => sprintf( __('Image Hover Effects published. Shortcode is: %s'), '' . '
<script type="text/javascript">
(function() {
    "use strict";
  // click events
  document.body.addEventListener("click", copy, true);

    // event handler
    function copy(e) {

    // find target element
    var 
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
      
    // is element selectable?
    if (inp && inp.select) {
      
      // select text
      inp.select();

      try {
        // copy text
        document.execCommand("copy");
        inp.blur();
        
        // copied animation
        t.classList.add("copied");
        setTimeout(function() { t.classList.remove("copied"); }, 1500);
      }
      catch (err) {
        alert("please press Ctrl/Cmd+C to copy");
      }    
    } 
    }

})();	
</script>
	
			' . '<input style="height: 30px; margin-right: 5px;" type="text" id="website" value="[iheb_oxi_hover id=\''.$post_ID.'\']" /><button  class="button button-primary button-large" data-copytarget="#website">copy</button>' ),
            6 => sprintf( __('Image Hover Effects published. Shortcode is: %s'), '' . '  ' . '
<script type="text/javascript">
(function() {
    "use strict";
  // click events
  document.body.addEventListener("click", copy, true);

    // event handler
    function copy(e) {

    // find target element
    var 
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
      
    // is element selectable?
    if (inp && inp.select) {
      
      // select text
      inp.select();

      try {
        // copy text
        document.execCommand("copy");
        inp.blur();
        
        // copied animation
        t.classList.add("copied");
        setTimeout(function() { t.classList.remove("copied"); }, 1500);
      }
      catch (err) {
        alert("please press Ctrl/Cmd+C to copy");
      }    
    } 
    }

})();	
</script>
			<input style="height: 30px; margin-right: 5px;" type="text" id="website" value="[iheb_oxi_hover id=\''.$post_ID.'\']" /><button  class="button button-primary button-large" data-copytarget="#website">copy</button>'),
			  );

    
    return $imagemessages;
        
}