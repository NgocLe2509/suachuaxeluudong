<?php
/**
 * elixar customizer section functions.
 *
 * @since  1.0.0
 * @access public
 * @package elixar
 */
class Elixar_Section_Plus extends WP_Customize_Section {
    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'elixar-premium';
    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $plus_text = '';
    /**
     * Custom plus section URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $plus_url = '';
	/**
	 * Custom section ID.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $id = '';
    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();
        $json['plus_text'] = $this->plus_text;
        $json['plus_url']  = $this->plus_url;
	    $json['id'] = $this->id;
        return $json;
    }
    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>
        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
            <h3><a href="{{ data.plus_url }}" target="_blank">{{{ data.plus_text }}}</a></h3>
        </li>
    <?php }
}
/*-----------------------------------------------------------------------------------*/
/*  Elixar Customizer Controls
/*-----------------------------------------------------------------------------------*/
class Elixar_Misc_Control extends WP_Customize_Control {
	public $settings = 'blogname';
	public $description = '';
	public $group = '';
	/**
	 * Render the description and title for the sections
	 */
	public function render_content() {
		switch ( $this->type ) {
			default:
			case 'heading':
				echo '<span class="customize-control-title">' . esc_html( $this->title ) . '</span>';
				break;
			case 'custom_message' :
				echo '<p class="description">' . wp_kses_post( $this->description ) . '</p>';
				break;
			case 'hr' :
				echo '<hr />';
				break;
		}
	}
}
class Elixar_Textarea_Custom_Control extends WP_Customize_Control
{
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="large-text" cols="20" rows="5" <?php esc_url( $this->link() ); ?>>
				<?php echo esc_textarea( $this->value() ); ?>
			</textarea>
			<p class="description"><?php echo wp_kses_post( $this->description ); ?></p>
		</label>
		<?php
	}
}
class Elixar_Theme_Support extends WP_Customize_Control {
	public function render_content() {
		echo wp_kses_post( 'Upgrade to <a href="#">Elixar Premium</a> to be able to change the section order and styling!', 'elixar' );
	}
}
class Elixar_Editor_Custom_Control extends WP_Customize_Control
{
    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'wp_editor';
    /**
     * Add support for palettes to be passed in.
     *
     * Supported palette values are true, false, or an array of RGBa and Hex colors.
     */
    public $mod;
    public function render_content() {
        $this->mod = strtolower( $this->mod );
        if( ! $this->mod = 'html' ) {
            $this->mod = 'tmce';
        }
        ?>
        <div class="wp-js-editor">
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            </label>
            <textarea class="wp-js-editor-textarea large-text" data-editor-mod="<?php echo esc_attr( $this->mod ); ?>" <?php esc_url( $this->link() ); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            <p class="description"><?php echo wp_kses_post( $this->description ); ?></p>
        </div>
    <?php
    }
}
/**
 * Alpha Color Picker Customizer Control
 *
 * This control adds a second slider for opacity to the stock WordPress color picker,
 * and it includes logic to seamlessly convert between RGBa and Hex color values as
 * opacity is added to or removed from a color.
 *
 * This Alpha Color Picker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this Alpha Color Picker. If not, see <http://www.gnu.org/licenses/>.
 */
class Elixar_Alpha_Color_Control extends WP_Customize_Control {
    /**
     * Official control name.
     */
    public $type = 'alpha-color';
    /**
     * Add support for palettes to be passed in.
     *
     * Supported palette values are true, false, or an array of RGBa and Hex colors.
     */
    public $palette;
    /**
     * Add support for showing the opacity value on the slider handle.
     */
    public $show_opacity;
    /**
     * Enqueue scripts and styles.
     *
     * Ideally these would get registered and given proper paths before this control object
     * gets initialized, then we could simply enqueue them here, but for completeness as a
     * stand alone class we'll register and enqueue them here.
     */
    public function enqueue() {
    }
    /**
     * Render the control.
     */
    public function render_content() {
        // Process the palette
        if ( is_array( $this->palette ) ) {
            $palette = implode( '|', $this->palette );
        } else {
            // Default to true.
            $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
        }
        // Support passing show_opacity as string or boolean. Default to true.
        $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
        // Begin the output. ?>
        <label>
            <?php // Output the label and description if they were passed in.
            if ( isset( $this->label ) && '' !== $this->label ) {
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
            }
            if ( isset( $this->description ) && '' !== $this->description ) {
                echo '<span class="description customize-control-description">' . wp_kses_post( $this->description ) . '</span>';
            } ?>
            <input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php esc_url( $this->link() ); ?>  />
        </label>
    <?php
    }
}
/**
 * Repeatable control class.
 *
 * @since  1.0.0
 * @access public
 */
class Elixar_Customize_Repeatable_Control extends WP_Customize_Control {
    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'repeatable';
    // public $fields = array();
    public $fields = array();
    public $live_title_id = null;
    public $title_format = null;
    public $defined_values = null;
    public $id_key = null;
    public $limited_msg = null;
    public $add_text = null;
    public function __construct( $manager, $id, $args = array() )
    {
        parent::__construct( $manager, $id, $args);
        if ( empty( $args['fields'] ) || ! is_array( $args['fields'] ) ) {
            $args['fields'] = array();
        }
        foreach ( $args['fields'] as $key => $op ) {
            $args['fields'][ $key ]['id'] = $key;
            if( ! isset( $op['value'] ) ) {
                if( isset( $op['default'] ) ) {
                    $args['fields'][ $key ]['value'] = $op['default'];
                } else {
                    $args['fields'][ $key ]['value'] = '';
                }
            }
        }
		
        $this->fields = $args['fields'];
        $this->live_title_id = isset( $args['live_title_id'] ) ? $args['live_title_id'] : false;
        $this->defined_values = isset( $args['defined_values'] ) ? $args['defined_values'] : false;
        $this->id_key = isset( $args['id_key'] ) ? $args['id_key'] : false;
        if ( isset( $args['title_format'] ) && $args['title_format'] != '' ) {
            $this->title_format = $args['title_format'];
        } else {
            $this->title_format = '';
        }
        if ( isset( $args['limited_msg'] ) && $args['limited_msg'] != '' ) {
            $this->limited_msg = $args['limited_msg'];
        } else {
            $this->limited_msg = '';
        }
        if ( ! isset( $args['max_item'] ) ) {
            $args['max_item'] = 0;
        }
        if ( ! isset( $args['allow_unlimited'] ) || $args['allow_unlimited'] != false ) {
            $this->max_item =  apply_filters( 'elixar_reepeatable_max_item', absint( $args['max_item'] ) );
        }  else {
            $this->max_item = absint( $args['max_item'] );
        }
        $this->changeable =  isset(  $args['changeable'] ) && $args['changeable'] == 'no' ? 'no' : 'yes';
        $this->default_empty_title =  isset(  $args['default_empty_title'] ) && $args['default_empty_title'] != '' ? $args['default_empty_title'] : esc_html__( 'Item', 'elixar' );
    }
    public function merge_data( $array_value, $array_default ){
        if ( ! $this->id_key ) {
            return $array_value;
        }
        if ( ! is_array( $array_value ) ) {
            $array_value =  array();
        }
        if ( ! is_array( $array_default ) ) {
            $array_default =  array();
        }
        $new_array = array();
        foreach ( $array_value as $k => $a ) {
            if ( is_array( $a ) ) {
                if ( isset ( $a[ $this->id_key ]  ) && $a[ $this->id_key ] != '' ) {
                    $new_array[ $a[ $this->id_key ] ] = $a;
                } else {
                    $new_array[ $k ] = $a;
                }
            }
        }
        foreach ( $array_default as $k => $a ) {
            if ( is_array( $a ) && isset ( $a[ $this->id_key ]  ) ) {
                if ( ! isset ( $new_array[ $a[ $this->id_key ] ] ) ) {
                    $new_array[ $a[ $this->id_key ] ] = $a;
                }
            }
        }
        return array_values( $new_array );
    }
    public function to_json() {
        parent::to_json();
        $value = $this->value();
        if (is_string( $value ) ) {
            $value = json_decode( $value, true );
        }
        if ( empty ( $value ) ){
            $value = $this->defined_values;
        } elseif ( is_array( $this->defined_values ) && ! empty ( $this->defined_values ) ) {
            $value = $this->merge_data( $value, $this->defined_values );
        }
        $this->json['live_title_id'] = $this->live_title_id;
        $this->json['title_format']  = $this->title_format;
        $this->json['max_item']      = $this->max_item;
        $this->json['limited_msg']   = $this->limited_msg;
        $this->json['changeable']    = $this->changeable;
        $this->json['default_empty_title']    = $this->default_empty_title;
        $this->json['value']         = $value;
        $this->json['id_key']        = $this->id_key;
        $this->json['fields']        = $this->fields;
    }
    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
        add_action( 'customize_controls_print_footer_scripts', array( __CLASS__, 'item_tpl' ), 66 );
    }
    public static function item_tpl(){
        ?>
        <script type="text/html" id="repeatable-js-item-tpl">
            <?php self::js_item(); ?>
        </script>
        <?php
    }
    public function render_content() {
        ?>
        <label>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
            <?php endif; ?>
        </label>
        <input data-hidden-value type="hidden" <?php $this->input_attrs(); ?> value="" <?php esc_url( $this->link() ); ?> />
        <div class="form-data">
            <ul class="list-repeatable"></ul>
        </div>
        <div class="repeatable-actions">
            <span class="button-secondary add-new-repeat-item"><?php echo ( $this->add_text ) ? esc_html( $this->add_text ) : __( 'Add an item', 'elixar' ); ?></span>
        </div>
        <?php
    }
    public static function js_item(){
        ?>
        <li class="repeatable-customize-control">
            <div class="widget">
                <div class="widget-top">
                    <div class="widget-title-action">
                        <a class="widget-action" href="#"></a>
                    </div>
                    <div class="widget-title">
                        <h4 class="live-title"><?php esc_html_e( 'Item', 'elixar' ); ?></h4>
                    </div>
                </div>
                <div class="widget-inside">
                    <div class="form">
                        <div class="widget-content">
                            <# var cond_v; #>
                            <# for ( i in data ) { #>
                                <# if ( ! data.hasOwnProperty( i ) ) continue; #>
                                <# field = data[i]; #>
                                <# if ( ! field.type ) continue; #>
                                <# if ( field.type ){ #>
                                    <#
                                    if ( ! _.isEmpty( field.required  ) ) {
                                        #>
                                        <div data-field-id="{{ field.id }}" class="field--item conditionize item item-{{ field.type }} item-{{ field.id }}" data-cond="{{ JSON.stringify( field.required ) }}" >
                                        <#
                                    } else {
                                        #>
                                        <div data-field-id="{{ field.id }}"  class="field--item item item-{{ field.type }} item-{{ field.id }}" >
                                        <#
                                    }
                                    #>
                                        <# if ( field.type !== 'checkbox' ) { #>
                                            <# if ( field.title ) { #>
                                            <label class="field-label">{{ field.title }}</label>
                                            <# } #>
                                            <# if ( field.desc ) { #>
                                            <p class="field-desc description">{{{ field.desc }}}</p>
                                            <# } #>
                                        <# } #>
                                        <# if ( field.type === 'hidden' ) { #>
                                            <input data-live-id="{{ field.id }}" type="hidden" value="{{ field.value }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="">
                                        <# } else if ( field.type === 'add_by' ) { #>
                                            <input data-live-id="{{ field.id }}" type="hidden" value="{{ field.value }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="add_by">
                                        <# } else if ( field.type === 'text' ) { #>
                                            <input data-live-id="{{ field.id }}" type="text" value="{{ field.value }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="">
                                        <# } else if ( field.type === 'checkbox' ) { #>
                                            <# if ( field.title ) { #>
                                                <label class="checkbox-label">
                                                    <input data-live-id="{{ field.id }}" type="checkbox" <# if ( field.value ) { #> checked="checked" <# } #> value="1" data-repeat-name="_items[__i__][{{ field.id }}]" class="">
                                                    {{ field.title }}</label>
                                            <# } #>
                                            <# if ( field.desc ) { #>
                                            <p class="field-desc description">{{ field.desc }}</p>
                                            <# } #>
                                        <# } else if ( field.type === 'select' ) { #>
                                            <# if ( field.multiple ) { #>
                                                <select data-live-id="{{ field.id }}"  class="select-multiple" multiple="multiple" data-repeat-name="_items[__i__][{{ field.id }}][]">
                                            <# } else  { #>
                                                <select data-live-id="{{ field.id }}"  class="select-one" data-repeat-name="_items[__i__][{{ field.id }}]">
                                            <# } #>
                                                <# for ( k in field.options ) { #>
                                                    <# if ( _.isArray( field.value ) ) { #>
                                                        <option <# if ( _.contains( field.value , k ) ) { #> selected="selected" <# } #>  value="{{ k }}">{{ field.options[k] }}</option>
                                                    <# } else { #>
                                                        <option <# if ( field.value == k ) { #> selected="selected" <# } #>  value="{{ k }}">{{ field.options[k] }}</option>
                                                    <# } #>
                                                <# } #>
                                            </select>
                                        <# } else if ( field.type === 'radio' ) { #>
                                            <# for ( k in field.options ) { #>
                                                <# if ( field.options.hasOwnProperty( k ) ) { #>
                                                    <label>
                                                        <input data-live-id="{{ field.id }}"  type="radio" <# if ( field.value == k ) { #> checked="checked" <# } #> value="{{ k }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="widefat">
                                                        {{ field.options[k] }}
                                                    </label>
                                                <# } #>
                                            <# } #>
                                        <# } else if ( field.type == 'color' || field.type == 'coloralpha'  ) { #>
                                            <# if ( field.value !='' ) { field.value = '#'+field.value ; }  #>
                                            <input data-live-id="{{ field.id }}" data-show-opacity="true" type="text" value="{{ field.value }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="color-field c-{{ field.type }} alpha-color-control">
                                        <# } else if ( field.type == 'media' ) { #>
                                            <# if ( !field.media  || field.media == '' || field.media =='image' ) {  #>
                                                <input type="hidden" value="{{ field.value.url }}" data-repeat-name="_items[__i__][{{ field.id }}][url]" class="image_url widefat">
                                            <# } else { #>
                                                <input type="text" value="{{ field.value.url }}" data-repeat-name="_items[__i__][{{ field.id }}][url]" class="image_url widefat">
                                            <# } #>
                                            <input type="hidden" data-live-id="{{ field.id }}"  value="{{ field.value.id }}" data-repeat-name="_items[__i__][{{ field.id }}][id]" class="image_id widefat">
                                            <# if ( !field.media  || field.media == '' || field.media =='image' ) {  #>
                                            <div class="current <# if ( field.value.url !== '' ){ #> show <# } #>">
                                                <div class="container">
                                                    <div class="attachment-media-view attachment-media-view-image landscape">
                                                        <div class="thumbnail thumbnail-image">
                                                            <# if ( field.value.url !== '' ){ #>
                                                                <img src="{{ field.value.url }}" alt="">
                                                            <# } #>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <# } #>
                                            <div class="actions">
                                                <button class="button remove-button " <# if ( ! field.value.url ){ #> style="display:none"; <# } #> type="button"><?php esc_html_e( 'Remove', 'elixar' ) ?></button>
                                                <button class="button upload-button" data-media="{{field.media}}" data-add-txt="<?php esc_attr_e( 'Add', 'elixar' ); ?>" data-change-txt="<?php esc_attr_e( 'Change', 'elixar' ); ?>" type="button"><# if ( ! field.value.url  ){ #> <?php esc_html_e( 'Add', 'elixar' ); ?> <# } else { #> <?php esc_html_e( 'Change', 'elixar' ); ?> <# } #> </button>
                                                <div style="clear:both"></div>
                                            </div>
                                        <# } else if ( field.type == 'textarea' || field.type == 'editor' ) { #>
                                            <textarea data-live-id="{{{ field.id }}}" data-repeat-name="_items[__i__][{{ field.id }}]">{{ field.value }}</textarea>
                                        <# }  else if ( field.type == 'icon'  ) { #>
                                            <#
                                                var icon_class = field.value;
                                                if ( icon_class.indexOf( 'fa-' ) != 0 ) {
                                                    icon_class = 'fa-' + field.value;
                                                } else {
                                                    icon_class = icon_class.replace( 'fa ', '' );
                                                }
                                                icon_class = icon_class.replace( 'fa-fa', '' );
                                                #>
                                            <div class="icon-wrapper">
                                                <i class="fa {{ icon_class }}"></i>
                                                <input data-live-id="{{ field.id }}" type="hidden" value="{{ field.value }}" data-repeat-name="_items[__i__][{{ field.id }}]" class="">
                                            </div>
                                            <a href="#" class="remove-icon"><?php esc_html_e( 'Remove', 'elixar' ); ?></a>
                                        <# }  #>
                                    </div>
                                <# } #>
                            <# } #>
                            <div class="widget-control-actions">
                                <div class="alignleft">
                                    <span class="remove-btn-wrapper">
                                        <a href="#" class="repeat-control-remove" title=""><?php esc_html_e( 'Remove', 'elixar' ); ?></a> |
                                    </span>
                                    <a href="#" class="repeat-control-close"><?php esc_html_e( 'Close', 'elixar' ); ?></a>
                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div><!-- .form -->
                </div>
            </div>
        </li>
        <?php
    }
}
/**
 * Class Elixar_Dropdown_Category_Control
 * @since 2.0.0
 */
class Elixar_Category_Control extends WP_Customize_Control {
    public $type = 'dropdown-category';
    protected $dropdown_args = false;
    protected function render_content() {
        ?><label><?php
        if ( ! empty( $this->label ) ) :
            ?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
        endif;
        if ( ! empty( $this->description ) ) :
            ?><span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span><?php
        endif;
        $dropdown_args = wp_parse_args( $this->dropdown_args, array(
            'taxonomy'          => 'category',
            'show_option_none'  => '',
            'selected'          => $this->value(),
            'show_option_all'   => __( 'All', 'elixar' ),
            'orderby'           => 'id',
            'order'             => 'ASC',
            'show_count'        => 1,
            'hide_empty'        => 1,
            'child_of'          => 0,
            'depth'             => 0,
            'tab_index'         => 0,
            'hide_if_empty'     => false,
            'option_none_value' => 0,
            'value_field'       => 'term_id',
        ) );
        $dropdown_args['echo'] = false;
        $dropdown = wp_dropdown_categories( $dropdown_args );
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
        echo $dropdown;
        ?></label><?php
    }
}
class Elixar_Customize_Heading extends WP_Customize_Control {
	public $type = 'heading';
    public function render_content() {
    	if ( !empty( $this->label ) ) : ?>
            <h3 class="elixar-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif;
        if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php }
    }
}
class Elixar_Editor_Scripts
{
    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public static function enqueue() {
        if ( ! class_exists( '_WP_Editors' ) ) {
            require(ABSPATH . WPINC . '/class-wp-editor.php');
        }
        add_action( 'customize_controls_print_footer_scripts', array( __CLASS__, 'enqueue_editor' ),  2 );
        add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'editor_js' ), 50 );
        add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'enqueue_scripts' ), 1 );
    }
    public  static function enqueue_editor(){
        if( ! isset( $GLOBALS['__wp_mce_editor__'] ) || ! $GLOBALS['__wp_mce_editor__'] ) {
            $GLOBALS['__wp_mce_editor__'] = true;
            ?>
            <script id="_wp-mce-editor-tpl" type="text/html">
                <?php wp_editor('', '__wp_mce_editor__'); ?>
            </script>
            <?php
        }
    }
}
class Elixar_Dropdown_Multiple_Chooser extends WP_Customize_Control
{
    public $type        = 'dropdown_multiple_chooser';
    public $placeholder = '';
    public function __construct($manager, $id, $elixar_args = array())
    {
        $this->placeholder = $elixar_args['placeholder'];
        parent::__construct($manager, $id, $elixar_args);

        if(isset($elixar_args['query'])){
            if($elixar_args['query']['data']=='taxonomy' ){
                $this->choices = $this->getTerms($elixar_args['query']['args']);
            }else if( $elixar_args['query']['data']=='post' ){
                $this->choices = $this->getPosts($elixar_args['query']['args']);
            }
        }

    }

    /*Enqueue resources for the control*/
    public function enqueue()
    {
        $minified_assests = intval( get_theme_mod( 'elixar_minified_assests', 1 ) );
        $min = ''; 
        if ( $minified_assests == 1 ) {
            $min = '.min';
        }
        wp_enqueue_script( 'elixar-customizer-chosen-script', get_template_directory_uri() .'/inc/customizer/assets/js/chosen.jquery'.$min.'.js', array("jquery") ); 
        wp_enqueue_style( 'elixar-customizer-chosen-style', get_template_directory_uri() .'/inc/customizer/assets/css/chosen'.$min.'.css');

    }

    public function getTerms($args){
        $dropdown_args = wp_parse_args($args, array(
            'taxonomy'          => 'category',
            'show_option_none'  => '',
            'selected'          => $this->value(),
            'orderby'           => 'id',
            'order'             => 'ASC',
            'hide_empty'        => 1,
            'child_of'          => 0,
        ));
        $terms              = get_terms($dropdown_args);
        $list = array();
        foreach ($terms as $term) {
            $list[$term->term_id] = $term->name;
        }
        return $list;
    }
    public function getPosts($args){
        $args = wp_parse_args($args, array(
            'numberposts'      => -1,
            'category'         => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => array(),
            'exclude'          => array(),
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'suppress_filters' => true,
        ));
        $posts = get_posts( $args );
        $list = array();
        foreach ($posts as $term) {
            $list[$post->ID] = $post->post_title;
        }
        return $list;
    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }

        ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>
                <?php if ($this->description) {?>
                    <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php }
        ?>
                <select data-placeholder="<?php echo esc_html($this->placeholder); ?>" multiple="multiple" class="wh-chosen-select" <?php $this->link();?>>
                    <?php
                    foreach ($this->choices as $value => $label) {
                        $selected = '';
                        if (in_array($value, $this->value())) {
                            $selected = 'selected="selected"';
                        }
                        echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . esc_html($label) . '</option>';
                    }
                    ?>
                </select>
            </label>
        <?php
    }
}

/**
 * The Customizer Repeator
 */
class Elixar_Custom_Sortable_Control extends WP_Customize_Control
{

    /**
     * Declare the control type.
     *
     * @access public
     * @var string
     */
    public $type = 'home-sortable';

    /**
     * Set up our control.
     */
    public function __construct($manager, $id, $args = array())
    {

        // Let the parent class do its thing.
        parent::__construct($manager, $id, $args);

    }
    /**
     * Enqueue scripts and styles for the custom control.
     *
     * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
     *
     * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
     * at 'customize_controls_print_styles'.
     *
     * @access public
     */
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('elixar-customizer-sortable-control', get_template_directory_uri() . '/inc/customizer/assets/css/elixar-sortable-control.css', time());

        wp_enqueue_script('elixar-customizer-sortable-control', get_template_directory_uri() . '/inc/customizer/assets/js/elixar-sortable-control.js', array('jquery'), time(), true);

    }
    public function to_json()
    {

        // Call parent to_json() method to get the core defaults like "label", "description", etc.
        parent::to_json();

        // The setting value.
        $this->json['value'] = json_decode($this->value());

        // The control choices.
        $this->json['choices'] = $this->choices;

        // The data link.
        $this->json['link'] = $this->get_link();

    }
    /**
     * Render the control to be displayed in the Customizer.
     */
    public function content_template()
    {
        ?>
        <# if ( data.label ) { #>
            <span class="customize-control-title">{{ data.label }}</span>
        <# } #>

        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>
        <label class='kirki-sortable'>

            <ul class="sortable">
                <# _.each( data.value, function( choiceID ) { #>
                    <li {{{ data.inputAttrs }}} class='kirki-sortable-item' data-value='{{ choiceID }}'>
                        <i class='dashicons dashicons-menu'></i>
                        <i class="dashicons dashicons-visibility visibility"></i>
                        {{{ data.choices[ choiceID ] }}}
                    </li>
                <# }); #>
                <# _.each( data.choices, function( choiceLabel, choiceID ) { #>
                    <# if ( -1 === data.value.indexOf( choiceID ) ) { #>
                        <li {{{ data.inputAttrs }}} class='kirki-sortable-item invisible' data-value='{{ choiceID }}'>
                            <i class='dashicons dashicons-menu'></i>
                            <i class="dashicons dashicons-visibility visibility"></i>
                            {{{ data.choices[ choiceID ] }}}
                        </li>
                    <# } #>
                <# }); #>
            </ul>
        </label>
        <?php
}
}
function elixar_customizer_control_scripts(){
    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script('elixar-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/elixar-customizer.js', array('customize-controls', 'wp-color-picker', 'jquery-ui-sortable'));
    wp_enqueue_style('elixar-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/elixar-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'elixar_customizer_control_scripts', 99 );
add_action( 'customize_controls_enqueue_scripts', array( 'Elixar_Editor_Scripts', 'enqueue' ), 95 );