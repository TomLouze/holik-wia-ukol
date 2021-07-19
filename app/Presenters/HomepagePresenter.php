<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter {

    const STATUS_OK = 'OK';
    const STATUS_ERROR = 'ERROR';
    const COLOR_RED = 'red';
    const COLOR_GREEN = 'green';

    private $title;

    ////////////////////////////////////////////////////////////////////////////
    // ACTIONS
    ////////////////////////////////////////////////////////////////////////////
    public function actionDefault() {
        $this->title = 'Jan Holík';
        $this->flashMessage('WIA úkol', 'info');
    }

    ////////////////////////////////////////////////////////////////////////////
    // RENDERS
    ////////////////////////////////////////////////////////////////////////////
    public function renderDefault() {
        $this->template->title = $this->title;
    }

    ////////////////////////////////////////////////////////////////////////////
    // HANDLES
    ////////////////////////////////////////////////////////////////////////////

    /**
     * Proccess Ajax request for changing rectangle color, returns json payload
     */
    public function handleChangeRectangleColor() {
        if ($this->isAjax()) {
            $data = $this->getHttpRequest()->getPost();
            $actualColor = $data['color'];
            $newColor = $this->getNewRectangleColor($actualColor);
            $this->sendSuccess($newColor);
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    // PRIVATES / HELPERS
    ////////////////////////////////////////////////////////////////////////////

    /** 
     * Returns new rectangle color
     * @param string $color
     * @return string
     */
    private function getNewRectangleColor($color){
        if($color === self::COLOR_GREEN){
            return self::COLOR_RED;
        }
        return self::COLOR_GREEN;
    }

    /**
     * Send JSON success response
     * @param array $data OPTIONAL
     */
    public function sendSuccess($data = array()) {
	$this->payload->status = self::STATUS_OK;
	$this->payload->data = $data;
	$this->sendPayload();
    }

    /**
     * Send JSON error response
     * @param string $message
     * @param int $code OPTIONAL
     */
    public function sendError($message, $code = NULL, $data = array()) {
	$this->payload->status = self::STATUS_ERROR;
	$this->payload->error = $message;
	$this->payload->code = $code;
	$this->payload->data = $data;
	$this->sendPayload();
    }

}
