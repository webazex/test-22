<?php


class Estates {
	static function getBaseArgs(){
		return [
			'posts_per_page' => get_option('posts_per_page'),
			'post_type' => 'estates',
		];
	}
	static function fetchResult($data){
		$result = [];
		if(!empty($data)){
			foreach ( $data as $postObj ) {
				$dataPost = get_field('estate-data', $postObj->ID);
				$result[$postObj->ID] = [
					'id' => $postObj->ID,
					'name' => (!empty($dataPost['title']))? $dataPost['title'] : false,
					'src' => (!empty($dataPost['src']))? $dataPost['src'] : get_stylesheet_directory_uri().'/img/pl.jpg',
					'stage' => (!empty($dataPost['stage']))? $dataPost['stage'] : false,
					'type' => (!empty($dataPost['type']))? $dataPost['type'] : false,
					'coordinates' => (!empty($dataPost['coordinates']))? $dataPost['coordinates'] : false,
					'href' => get_permalink($postObj->ID),
					'desc' => (!empty($postObj->post_content))? $postObj->post_content : false
				];
			}
		}
		return $result;
	}
	static function getAllEstates(){
		$estates = [];
		$args = self::getBaseArgs();
		$args['posts_per_page'] = -1;
		$obj = new WP_Query($args);
		if(!empty($obj->posts)){
			$estates = self::fetchResult($obj->posts);
		}
		return $estates;
	}

	static function getFilteredEstates($filter = []){
		$return = [];
		$args = self::getBaseArgs();

		if(!empty($filter)){
			$meta = [
				'relation' => "OR"
			];
			foreach ($filter as $filterItem){
				if(intval($filterItem['value']) !== 0){
					array_push($meta, [
						'key' => 'estate-data_'.$filterItem['name'],
						'value' => intval($filterItem['value'])
					]);
					$meta['relation'] = "AND";
				}
			}
			$args['meta_query'] = $meta;

			$obj = new WP_Query($args);
			if(!empty($obj->posts)){
				$return = self::fetchResult($obj->posts);
			}
		}
		return $return;
	}

	static function getEstate($postObj){
		$dataPost = get_field('estate-data', $postObj->ID);
		return [
			'id' => $postObj->ID,
			'name' => (!empty($dataPost['title']))? $dataPost['title'] : false,
			'src' => (!empty($dataPost['src']))? $dataPost['src'] : false,
			'stage' => (!empty($dataPost['stage']))? $dataPost['stage'] : false,
			'type' => (!empty($dataPost['type']))? $dataPost['type'] : false,
			'coordinates' => (!empty($dataPost['coordinates']))? $dataPost['coordinates'] : false,
			'href' => get_permalink($postObj->ID),
			'desc' => (!empty($postObj->post_content))? $postObj->post_content : false
		];
	}

	static function getEstateItems($data){
		$html = '';
		if(!empty($data)){
			foreach ($data as $estate):
				$html .= '<a href="'.$estate['href'].'" class="estates__estate-item" id="'.$estate['id'].'">';
				if($estate['src']):
					$html .= '<div class="estate-item__image-container">';
					$html .= '<img src="'.$estate['src'].'" alt="'.$estate['name'].'">';
					$html .= '</div>';
				endif;
				if($estate['name']):
					$html .= '<div class="estate-item__text-container">';
					$html .= '<h3 class="estate-item__title mb-0">';
					$html .= $estate['name'];
					$html .= '</h3>';
				endif;
				if($estate['desc']):
					$html .= '<p class="estate-item__desc card-text mb-auto">';
					$html .= strip_tags($estate['desc'], 'span');
					$html .= '</p>';
				endif;
				$html .= '</div>';
				$html .= '</a>';
			endforeach;
		}else{
			$html .= '<div style="text-align: left;">'.__('Записів нема', 'understrap-child');
		}
		return $html;
	}
}