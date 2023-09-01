<?php

function estatesFilterHandler(){
	if(!empty($_POST['datafilter'])){
		$estates = Estates::getFilteredEstates($_POST['datafilter']);
		if(!empty($estates)){
			echo Estates::getEstateItems($estates);
		}
	}else{
		wp_send_json_error(['message' => __('Дані не отримано', 'understrap-child')]);
	}
	wp_die();
}
add_action( 'wp_ajax_filter-estates', 'estatesFilterHandler' );
add_action( 'wp_ajax_nopriv_filter-estates', 'estatesFilterHandler' );