<?php

/**
 * 중고거래 모듈
 * 
 * Copyright (c) 김영상
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class JoonggotradeModel extends Joonggotrade
{
	public static function getTradeStatusHTML($document_srl)
    {
        $args = new stdClass();
        $args->document_srl = $document_srl;
        $output = executeQuery('joonggotrade.getTradeByDocumentSrl', $args);

        $trade = $output->data;
        switch($trade->trade_status)
        {
            case 200:
                return "<span style='color: #e67e22'>[판매중]</span>";

            case 201:
                return "<span style='color: #3498db'>[거래 예정]</span>";

            case 202:
                return "<span style='color: #95a5a6'>[판매 완료]</span>";

            case 300:
                return "<span style='color: #95a5a6'>[취소됨]</span>";
        }
    }

    public static function getTradeStatus($document_srl)
    {
        $args = new stdClass();
        $args->document_srl = $document_srl;
        $output = executeQuery('joonggotrade.getTradeByDocumentSrl', $args);

        $trade = $output->data;
        return $trade->trade_status;
    }

    public static function getTrade($document_srl)
    {
        $args = new stdClass();
        $args->document_srl = $document_srl;
        $output = executeQuery('joonggotrade.getTradeByDocumentSrl', $args);

        $trade = $output->data;
        return $trade;
    }

    public static function getRating($document_srl, $giver_srl)
    {
        $args = new stdClass();
        $args->document_srl = $document_srl;
        $args->giver = $giver_srl;
        $output = executeQuery('joonggotrade.getMyDocumentRating', $args);

        return $output->data;
    }
}
