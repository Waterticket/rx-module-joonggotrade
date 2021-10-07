<?php

/**
 * 중고거래 모듈
 * 
 * Copyright (c) 김영상
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class JoonggotradeAdminView extends Joonggotrade
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 관리자 화면 템플릿 경로 지정
		$this->setTemplatePath($this->module_path . 'tpl');
	}
	
	/**
	 * 관리자 설정 화면 예제
	 */
	public function dispJoonggotradeAdminConfig()
	{
		// 현재 설정 상태 불러오기
		$config = $this->getConfig();
		
		// Context에 세팅
		Context::set('joonggotrade_config', $config);
		
		// 스킨 파일 지정
		$this->setTemplateFile('config');
	}
}
