<?php 

	class ViewElement {
		
		public function optionElement ($value, $title, $selected = "") {
			return '<option '.$selected.' value="'.$value.'">'.$title.'</option>';
		}
		
		public function tableRow () {
			
		}
		
		public function tableColumn() {
// 			html = '<td>'; 
		}
	}

?>