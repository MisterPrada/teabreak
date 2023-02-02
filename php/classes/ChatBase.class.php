<?php

/* Ѕазовый класс, который используетс€ классами ChatLine и ChatUser */

class ChatBase{

	// ƒанный конструктор используетс€ всеми класса чата:

	public function __construct(array $options){
		
		foreach($options as $k=>$v){
			if(isset($this->$k)){
				$this->$k = $v;
			}
		}
	}
}

?>