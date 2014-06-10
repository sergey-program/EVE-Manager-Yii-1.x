<?php

interface CallInterface
{
    // in abstract
    public function getUrl();

    public function getUrlObject();

    public function getAlias();

    public function curlHandleCreate();

    public function curlHandleGet();

    public function setResult(cCallResult $cCallResult);

    // in class

    public function parseResult();

    public function updateResult();
}