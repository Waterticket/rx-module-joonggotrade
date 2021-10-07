<?php

/**
 * 중고거래 모듈
 * 
 * Copyright (c) 김영상
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class JoonggotradeView extends Joonggotrade
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 스킨 경로 지정
		$this->setTemplatePath($this->module_path . 'skins/' . ($this->module_info->skin ?: 'default'));
	}
	
	/**
	 * 메인 화면 예제
	 */
	public function dispJoonggotradeIndex()
	{
		// 스킨 파일명 지정
		$this->setTemplateFile('index');
	}
}
