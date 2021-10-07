<?php

include_once __DIR__ . '/joonggotrade.view.php';

/**
 * 중고거래 모듈
 * 
 * Copyright (c) 김영상
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class JoonggotradeMobile extends JoonggotradeView
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 스킨 경로 지정
		$this->setTemplatePath($this->module_path . 'm.skins/' . ($this->module_info->mskin ?: 'default'));
	}
	
	/**
	 * 이 클래스에서 따로 정의하지 않은 함수는 View를 따름
	 */
}
