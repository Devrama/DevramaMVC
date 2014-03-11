<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

final class DMVCPagination {
	public function generate($num_of_pagination_links, $total_num_of_data, $num_of_data_per_page, $current_position, $base_url){
		
		if(strpos($base_url, '&') === FALSE) $page_get_name = 'page';
		else $page_get_name = '&page';
		
		if(($total_num_of_data % $num_of_data_per_page) == 0) $total_pages = ($total_num_of_data/$num_of_data_per_page);
		else $total_pages = floor($total_num_of_data/$num_of_data_per_page) + 1;
		
		$last_position_link_url = $base_url.$page_get_name.'='.$total_pages;
		
		if($current_position > 1) $prev_position_link_url = $base_url.$page_get_name.'='.($current_position - 1);
		else $prev_position_link_url = '';
		
		if($total_num_of_data > ($current_position*$num_of_data_per_page)) $next_position_link_url = $base_url.$page_get_name.'='.($current_position + 1); 
		else $next_position_link_url =  '';
		
		$str_pagination = '<div class="pagination" style="text-align:center;">';
		
		
		
		$str_pagination .= '<ul style="vertical-align: middle;">';
		
		if($current_position > 1) {
			$str_pagination .= '<li><a href="'.$base_url.$page_get_name.'=1">&laquo;</a></li>';
			$str_pagination .= '<li><a href="'.$prev_position_link_url.'">&lsaquo;</a></li>';
			
		}
		else {
			$str_pagination .= '<li class="disabled"><a href="#">&laquo;</a></li>';
			$str_pagination .= '<li class="disabled"><a href="#">&lsaquo;</a></li>';
			
		}
		
			
		
		if($current_position%$num_of_pagination_links == 0) $start_link = ((floor($current_position/$num_of_pagination_links)-1) * $num_of_pagination_links) + 1;
		else $start_link = (floor($current_position/$num_of_pagination_links) * $num_of_pagination_links) + 1;
		
		$last_link_number = $start_link+$num_of_pagination_links-1;
		
		if($last_link_number >= $total_pages) $last_link_number = $total_pages;
		
		for($i=$start_link; $i <= $last_link_number; $i++){
			if($i == $current_position)	$str_pagination .= '<li class="active"><a href="'.$base_url.$page_get_name.'='.$i.'">'.$i.'</a></li>';
			else $str_pagination .= '<li><a href="'.$base_url.$page_get_name.'='.$i.'">'.$i.'</a></li>';
		}
			
		if(empty($next_position_link_url)) $str_pagination .= '<li class="disabled"><a href="#">&rsaquo;</a></li>';
		else $str_pagination .= '<li><a href="'.$next_position_link_url.'">&rsaquo;</a></li>';
		
		if($current_position == $total_pages) $str_pagination .= '<li class="disabled"><a href="#">&raquo;</a></li>';
		else $str_pagination .= '<li><a href="'.$last_position_link_url.'">&raquo;</a></li>';
		
		$str_pagination .= '</ul>';
		if((($current_position*$num_of_data_per_page)-$num_of_data_per_page+1) <= $total_num_of_data){
			$str_pagination .= ' <div style="text-align:center;"><small>'.(($current_position*$num_of_data_per_page)-$num_of_data_per_page+1).'-'.(empty($next_position_link_url) ? $total_num_of_data : ($current_position*$num_of_data_per_page)).' of '.$total_num_of_data.'('.$total_pages.' page'.(($total_pages > 1) ? 's': '').')</small></div>';
		}
		$str_pagination .= '</div><!-- end of .pagination -->';
		

		return $str_pagination;
	}
}