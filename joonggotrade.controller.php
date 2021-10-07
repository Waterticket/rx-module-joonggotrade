<?php

/**
 * 중고거래 모듈
 * 
 * Copyright (c) 김영상
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class JoonggotradeController extends Joonggotrade
{
	/**
	 * 트리거 예제: 새 글 작성시 실행
	 * 
	 * 주의: 첨부파일이 있는 경우 아직 작성하지 않았어도 이 함수가 실행될 수 있음
	 * 
	 * @param object $obj
	 */
	public function triggerAfterInsertDocument($obj)
	{
		$logged_info = Context::get('logged_info');
		$price = $obj->extra_vars1;
		preg_replace("/[^0-9]/", "", $price);

		$args = new stdClass();
		$args->document_srl = $obj->document_srl;
		$args->seller_srl = $logged_info->member_srl;
		$args->buyer_srl = 0;
		$args->trade_price = $price;
		$args->trade_status = 200;
		$args->insert_time = time();
		$args->update_time = time();
		executeQuery('joonggotrade.insertTrade', $args);
	}
	
	/**
	 * 트리거 예제: 글 수정시 실행
	 * 
	 * 주의: 첨부파일이 있는 경우 최종 작성 시점에 이 함수가 실행될 수 있음
	 * 
	 * @param object $obj
	 */
	public function triggerAfterUpdateDocument($obj)
	{
	
	}
	
	/**
	 * 트리거 예제: 글 삭제시 실행
	 * 
	 * @param object $obj
	 */
	public function triggerAfterDeleteDocument($obj)
	{
		$args = new stdClass();
		$args->document_srl = $obj->document_srl;
		executeQuery('joonggotrade.deleteTrade', $args);
	}

	public function procJoonggotradeChangeStatus()
	{
		// 현재 설정 상태 불러오기
		$config = $this->getConfig();
		
		// 제출받은 데이터 불러오기
		$vars = Context::getRequestVars();

		$code = $vars->code;
		$document_srl = $vars->document_srl;
		$buyer_srl = $vars->buyer_srl;

		$args = new stdClass();
		$args->document_srl = $document_srl;
		$args->trade_status = $code;
		$args->update_time = time();
		switch($code)
		{
			case 200:
				$args->buyer_srl = 0;
				break;

			case 201:
				$args->buyer_srl = $buyer_srl;
				break;
		}

		$output = executeQuery('joonggotrade.updateTrade', $args);
		exit;
	}

	public function procJoonggotradePeerEvaluation()
	{
		// 현재 설정 상태 불러오기
		$config = $this->getConfig();
		
		// 제출받은 데이터 불러오기
		$vars = Context::getRequestVars();

		$rating = $vars->rating;
		$giver = $vars->member_srl;
		$receiver = $vars->target_srl;
		$document_srl = $vars->document_srl;

		$args = new stdClass();
		$args->giver = $giver;
		$args->receiver = $receiver;
		$args->star = $rating;
		$args->document_srl = $document_srl;
		$args->insert_time = time();
		$output = executeQuery('joonggotrade.insertRating', $args);
		exit;
	}
}
