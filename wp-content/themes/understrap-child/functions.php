<?php
// Создание постов. Создавал кодом так как плагины для этого не использую кроме прямого указания заказчика(для правок им)
add_action('init', 'add_posttype');

function add_posttype(){

	$labels1 = array(
		'name'               => _x("Недвижимость", 'post type general name', 'understrap-child'),
		'singular_name'      => _x("Недвижимость", 'post type singular name', 'understrap-child'),
		'add_new'            => _x('Добавить недвижимость', 'understrap-child'),
		'add_new_item'       => __('Добавить недвижимость', 'understrap-child'),
		'edit_item'          => __('Редактировать недвижимость', 'understrap-child'),
		'new_item'           => __('Новая недвижимость', 'understrap-child'),
		'all_items'          => __('Все посты недвижимости', 'understrap-child'),
		'view_item'          => __('Посмотреть недвижимость', 'understrap-child'),
		'search_items'       => __('Поиск недвижимости', 'understrap-child'),
		'not_found'          =>  __('Не найдена нужная недвижимость', 'understrap-child'),
		'not_found_in_trash' => __('Корзина пуста', 'understrap-child'), 
		'parent_item_colon'  => '',
		'menu_name'          => __("Недвижимость", 'understrap-child')

	);
	
	$args1 = array(
		'labels'             => $labels1,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => _x( "real_property", 'realproperty', 'understrap-child' ) ),
		'capability_type'    => 'post',
		'has_archive'        => true, 
		'hierarchical'       => true,
		'menu_position'      => 10,
		'supports'           => array('title','editor','author','thumbnail','comments','post-formats','custom-fields', 'post-thumbnails'),
	); 

	register_post_type("real_property", $args1);
	
	
	$labels1 = array(
		'name'               => _x("Город", 'post type general name', 'understrap-child'),
		'singular_name'      => _x("Город", 'post type singular name', 'understrap-child'),
		'add_new'            => _x('Добавить город', 'understrap-child'),
		'add_new_item'       => __('Добавить город', 'understrap-child'),
		'edit_item'          => __('Редактировать город', 'understrap-child'),
		'new_item'           => __('Новый город', 'understrap-child'),
		'all_items'          => __('Все города', 'understrap-child'),
		'view_item'          => __('Посмотреть город', 'understrap-child'),
		'search_items'       => __('Поиск городов', 'understrap-child'),
		'not_found'          =>  __('Не найден город в списке', 'understrap-child'),
		'not_found_in_trash' => __('Корзина пуста', 'understrap-child'), 
		'parent_item_colon'  => '',
		'menu_name'          => __("Город", 'understrap-child')

	);
	
	$args1 = array(
		'labels'             => $labels1,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => _x( "city_post", 'realproperty', 'understrap-child' ) ),
		'capability_type'    => 'post',
		'has_archive'        => true, 
		'hierarchical'       => true,
		'menu_position'      => 10,
		'supports'           => array('title','editor','author','thumbnail','comments','post-formats','custom-fields', 'post-thumbnails'),
	); 

	register_post_type("city_post", $args1);
}
// Создание таксономии. Создавал кодом так как плагины для этого не использую кроме прямого указания заказчика(для правок им)

add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('property_type', array('real_property'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Тип недвижимости',
			'singular_name'     => 'Тип недвижимости',
			'search_items'      => 'Искать тип недвижимости',
			'all_items'         => 'Все типы недвижимости',
			'view_item '        => 'Просмотреть тип недвижимости',
			'parent_item'       => 'Родительский тип недвижимости',
			'parent_item_colon' => 'Родительский тип недвижимости:',
			'edit_item'         => 'Править тип недвижимости',
			'update_item'       => 'Обновить тип недвижимости',
			'add_new_item'      => 'Довавить новый тип недвижимости',
			'new_item_name'     => 'Новый тип недвижимости',
			'menu_name'         => 'Тип недвижимости',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => "post_categories_meta_box", // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => true, // по умолчанию значение show_ui
	) );
}

// Подключение аякс кода
function my_load_scripts() {
	wp_enqueue_style( 'understrap-child-style',  get_stylesheet_directory_uri() . '/style.css', array() );
	wp_enqueue_script( "get_index_sales_form", get_stylesheet_directory_uri() . "/js/get_index_sales_form.js", ("jquery"), time( get_stylesheet_directory_uri() . "/js/get_index_sales_form.js" ), true );
}

add_action('wp_enqueue_scripts', 'my_load_scripts');


// Общая функция для вывода 10 постов на главной
function get_index_posts_list($post_type) {
	?>
<div class="index-list index-block-list-<?=$post_type;?> container">
<?php
// параметры по умолчанию
$args = array(
	'numberposts' => 10,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'post_type'   => $post_type,
);
$property_posts = get_posts( $args );

foreach($property_posts as $post_key => $post_value){
?>
	<div class="row">
		<div class="col-md-3">
		<?php
			echo get_the_post_thumbnail( $post_value->ID, 'thumbnail'); 
		?>
		</div>
		<div class="col-md-8">
		<?php
			if("real_property" == $post_type) 
				get_real_property_post($post_value);
			else 
				get_city_post($post_value);
		?>
		</div>
	</div>

<?php
}
wp_reset_postdata(); // сброс
?>
</div>
<?php
}

// Вывод поста недвижимости в списке
function get_real_property_post($post) {
	echo "<p><a href='" . get_permalink( $post->ID ) ."'>". esc_html( get_the_title($post->ID ) ). "</a></p>";
	echo "<p>Площадь: ". get_field("square", $post->ID) ."м²</p>";
	echo "<p>Стоимость: ". get_field("cost", $post->ID) ."</p>";
	echo "<p>Адрес: ". get_field("address", $post->ID) ."</p>";
	echo "<p>Жилая площадь: ". get_field("living_space", $post->ID) ."м²</p>";
	echo "<p>Этаж: ". get_field("floor", $post->ID) ."</p>";
}

// Вывод поста города в списке
function get_city_post($post) {
	echo "<a href='" . get_permalink( $post->ID ) ."'>". esc_html( get_the_title($post->ID ) ). "</a></p>";
}

// Вывод поста недвижимости на странице недвижимости
function get_single_real_property_post($post_ID) {
	echo "<p>Площадь: ". get_field("square", $post_ID) . "м²</p>";
	echo "<p>Стоимость: ". get_field("cost", $post_ID) . "</p>";
	echo "<p>Адрес: ". get_field("address", $post_ID) ."</p>";
	echo "<p>Жилая площадь: ". get_field("living_space", $post_ID) ."м²</p>";
	echo "<p>Этаж: ". get_field("floor", $post_ID) ."</p>";
}

// Вывод поста города на странице города
function get_single_city_post($get_the_ID) {
	// параметры по умолчанию
	$args = array(
		'numberposts' => 10,
		'category'    => 0,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => 'sootnoshenie_zapis-gorod',
		'meta_value'  => 'a:1:{i:0;s:'.strlen($get_the_ID+"").':"'.$get_the_ID.'";}',
		'post_type'   => "real_property",
	);
	$property_posts = get_posts( $args );
	
	foreach($property_posts as $post_key => $post_value){
?>
	<div class="single_city_post_row row">
		<div class="col-md-3">
		<?php
			echo get_the_post_thumbnail( $post_value->ID, 'thumbnail'); 
		?>
		</div>
		<div class="col-md-9">
		<?php
			get_real_property_post($post_value);
		?>
		</div>
	</div>
<?php 
	}
	wp_reset_postdata(); // сброс
}

// Вывод формы добавления недвижимости

function get_index_sales_form() {
?>
            <form id="sales-ajax-form" class="sform" enctype="multipart/form-data">
			<input type="hidden" name="action" value="sales_ajax_form">
			    <div class="box-field__input">
                  <input type="text" name="title" class="form-control js-placeholder-effect" placeholder="Укажите заголовок объявления">
                </div>
                <div class="box-field__input">
                  <input type="text" name="square" class="form-control js-placeholder-effect numeric-input" placeholder="Укажите площадь предлагаемой недвижимости">
                </div>
                <div class="box-field__input">
                  <input type="text" name="cost" class="form-control js-placeholder-effect" placeholder="Укажите предполагаемую стоимость недвижимости">
                </div>

                <div class="box-field__input">
                  <input type="text" name="address" class="form-control js-placeholder-effect" placeholder="Укажите адрес предлагаемой недвижимости">
                </div>
				
                <div class="box-field__input">
                  <input type="text" name="living_space" class="form-control js-placeholder-effect numeric-input" placeholder="Укажите жилую площадь предлагаемой недвижимости">
                </div>
                <div class="box-field__input">
                  <input type="text" name="floor" class="form-control js-placeholder-effect numeric-input" placeholder="Укажите этаж на котором предлагаемая квартира/офис или этажность здания">
                </div>
                <div class="box-field__input">
                  <textarea class="form-control" name="text_summary" placeholder="Описание вашей недвижимости"></textarea>
                </div>
                <div class="box-field__input">
				  <select name="sootnoshenie_zapis_gorod" class="form-control js-placeholder-effect">
					<option disabled="disabled" selected="selected">Выберите город из предложенного списка</option>
				<?php
				// параметры по умолчанию
				$args = array(
					'numberposts' => -1,
					'category'    => 0,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'include'     => array(),
					'exclude'     => array(),
					'post_type'   => "city_post",
				);
				$property_posts = get_posts( $args );

				foreach($property_posts as $post_key => $post_value){
				?>
					<option value="<?=$post_value->ID;?>"><?=$post_value->post_title;?></option>
				<?php
				}
				wp_reset_postdata(); // сброс
				?>
					<option value="empty">Нет в списке. Добавлен в описание</option>
				  </select>
                </div>

				<div class="box-field">
					<div class="box-field__submit">
						<button class="button button_popup form-control mw" id="button_form_submit" type="submit">Выставить на продажу</button> 						
					</div>
				</div>
            </form>
<?php
}

function sales_ajax_form() {

	$query = $_POST;
	$post_data = array(
		'post_title'    => wp_strip_all_tags( $_POST['title'] ),
		'post_content'  => $_POST['text_summary'],
		'post_status'   => 'draft',
		'post_author'   => 1,
		'post_type'		=> 'real_property',
		'post_category' => array( 0 )
	);
	
	$post_id = wp_insert_post( $post_data );
	add_post_meta( $post_id, "square", $query['square']);
	add_post_meta( $post_id, "cost", $query['cost']);
	add_post_meta( $post_id, "address", $query['address']);
	add_post_meta( $post_id, "living_space", $query['living_space']);
	add_post_meta( $post_id, "floor", $query['floor']);
	if("empty" != $query['sootnoshenie_zapis_gorod'] ) 
		add_post_meta( $post_id, "sootnoshenie_zapis-gorod", $query['sootnoshenie_zapis_gorod']);

	echo "Пост создан под номером ".$post_id;

	die();
}
add_action( 'wp_ajax_sales_ajax_form', 'sales_ajax_form' ); 
add_action( 'wp_ajax_nopriv_sales_ajax_form', 'sales_ajax_form' ); 
