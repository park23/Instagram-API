<?php

namespace InstagramFollowers;

use InstagramFollowers\Interfaces\CookiesStorageInterface;
use InstagramFollowers\Repositories\AuthorizationStorageRepository;
use InstagramFollowers\Repositories\CookiesStorageRepository;
use InstagramFollowers\Request\AccountRequest;
use InstagramFollowers\Request\LauncherRequest;
use InstagramFollowers\Request\PeopleRequest;
use InstagramFollowers\Request\QERequest;

class Instagram extends Client {

    /**
     * @var $AccountRequest AccountRequest
     */
    public $accountRequest;

    /**
     * @var $LauncherRequest LauncherRequest
     */
    public $launcherRequest;

    /**
     * @var $QERequest QERequest
     */
    public $qERequest;

    /**
     * @var $people PeopleRequest
     */
    public $people;

    //////

    /**
     * @var $cookiesStorage CookiesStorageInterface
     */
    protected $cookiesStorage;

    /**
     * @var $cookiesStorage CookiesStorageInterface
     */
    protected $authorizationStorage;

    /**
     * @var $username string
     */
    protected $username = null;

    /**
     * Instagram constructor.
     */
    public function __construct() {
        $this->cookiesStorage = new CookiesStorageRepository();
        $this->authorizationStorage = new AuthorizationStorageRepository();

        parent::__construct();

        $this->accountRequest = new AccountRequest($this);
        $this->people = new PeopleRequest($this);
        $this->launcherRequest = new LauncherRequest($this);
        $this->qERequest = new QERequest($this);
    }

    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    public function login($username, $password) {
        if ($this->device_storage->session_exists($username) === true && $this->device_storage->session_is_valid($username) === true) {

            $session = $this->device_storage->read_device_settings($username);
            $this->initDeviceFromArray($session);
            $this->readCookies($username, $this->cookiesStorage);
            $this->readAuthorization($username, $this->authorizationStorage);
        } else {
            $this->getDeviceStorage()->save_device_settings($username,
                $this->getDeviceId(), $this->getPhoneId(),
                $this->getAdvertisingId(), $this->getUuid(),
                $this->getAndroidId()
            );
        }

        return $this->checkAndRelogin($username, $password);

    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Pre Login flow
     */
    protected function _preLoginFlowRequests() {
        $this->accountRequest->contactPointPrefill();
        $this->launcherRequest->preLoginSync();
        $this->qERequest->syncLoginExperiments();
        $this->launcherRequest->preLoginSync();
        $this->qERequest->syncLoginExperiments();


    }

    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    protected function checkAndRelogin($username, $password) {
        if ($this->authorizationStorage->is_valid_authorization($username) === false) {
            $this->_preLoginFlowRequests();
            return $this->_login($username, $password);
        } else {
            $this->setUsernameAndCookieStorage($username, $this->cookiesStorage);
            return true;
        }
    }

    protected function zeroArrayValue($array) {
        if ($array !== null && is_array($array)) {
            return $array[0];
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function getPasswordEncPubKey() {
        return $this->passwordEncPubKey;
    }

    /**
     * @return int
     */
    public function getPasswordPubKeyId() {
        return $this->passwordPubKeyId;
    }


    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    protected function _login($username, $password) {
        $this->username = $username;

        $lastResponse = $this->getLastResponse();
        if ($lastResponse !== null) {
            $this->setPasswordEncPubKey($this->zeroArrayValue($lastResponse->getHeader("ig-set-password-encryption-pub-key")));
            $this->setPasswordPubKeyId($this->zeroArrayValue($lastResponse->getHeader("ig-set-password-encryption-key-id")));
            $response = $this->accountRequest->login($username, $password);
        } else {
            $response = $this->accountRequest->login_deprecated($username, $password);
        }
        $this->saveCookies($username, $this->cookiesStorage);


        if ($response->getInvalidCredentials() === true || $response->getStatus() === 'fail') {
            throw new \Exception(($response->isErrorTitle() === true) ? $response->getErrorTitle() : $response->getErrorType(), 1);
        } else {
            $this->saveAuthorization($username, $this->authorizationStorage);
            return $response;
        }
    }

}
