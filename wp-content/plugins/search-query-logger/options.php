<?php

// initialization
add_action( 'admin_menu', 'logger_add_menu_page' );
add_action( 'admin_init', 'logger_register_settings' );

// add menu page
function logger_add_menu_page() { 
  add_menu_page( 'Search Query Logger Options', 'Search Query Logger', 'manage_options', 'search_query_logger', 'logger_menu_page' );
}

// build menu page
function logger_menu_page() { 

  ?>
  <div class="wrap">
    <form action='options.php' method='post'>
      
      <h2>Search Query Logger Options</h2>
      
      <?php
        settings_fields( 'logger_options_group' );
        do_settings_sections( 'logger_options_group' );
        submit_button();
      ?>
      
    </form>
  </div>
  <?php

}

// register settings/add settings fields
function logger_register_settings() { 

  register_setting( 'logger_options_group', 'logger_settings' );

  add_settings_section( 'logger_logger_options_group_section', 
                        'Main Settings',
                        'logger_settings_section_callback', 
                        'logger_options_group'
  );

  add_settings_field(   'logger_number_terms_to_display', 
                        'Default value of unique search terms to display', 
                        'logger_number_terms_to_display_render', 
                        'logger_options_group', 
                        'logger_logger_options_group_section' 
  );

  add_settings_field(   'logger_display_mode', 
                        'How to display search terms', 
                        'logger_display_mode_render', 
                        'logger_options_group', 
                        'logger_logger_options_group_section' 
  );

}

// render the "terms to display" field
function logger_number_terms_to_display_render() { 

  $options = get_option( 'logger_settings' );
  ?>
  <input type='text' name='logger_settings[logger_number_terms_to_display]' value='<?php echo $options['logger_number_terms_to_display']; ?>'>
  <?php

}

// render the "display mode" radio buttons
function logger_display_mode_render() { 

  $options = get_option( 'logger_settings' );
  ?>
  <label>
    <input type='radio' name='logger_settings[logger_display_mode]' <?php checked( $options['logger_display_mode'], 1 ); ?> value='1'>
    Display default number of query words sorted by frequency
  </label><br />
  <label>
    <input type='radio' name='logger_settings[logger_display_mode]' <?php checked( $options['logger_display_mode'], 2 ); ?> value='2'>
    Display all query words sorted by frequency
  </label><br />
  <label>
    <input type='radio' name='logger_settings[logger_display_mode]' <?php checked( $options['logger_display_mode'], 3 ); ?> value='3'>
    Display all records/fields in database table in chronological order
  </label>
  <?php

}

// section description
function logger_settings_section_callback() { 
  echo 'Because adding more than one section is too much effort.';
}

?>
