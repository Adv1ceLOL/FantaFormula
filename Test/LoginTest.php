<?php
use Facebook\WebDriver\Opera\OperaDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Opera\OperaOptions;
use Facebook\WebDriver\Opera\OwperaDriverService;

$options = new OperaOptions();
$options->setBinary('C:\\path\\to\\your\\opera\\binary'); // replace with the path to your Opera binary

$service = OperaDriverService::createDefaultService('C:\\xampp2\\htdocs\\login\\'); // this should point to the directory of your OperaDriver

$capabilities = DesiredCapabilities::opewra();
$capabilities->setCapability(OperaOptions::CAPABILITY, $options);
$capabilities->setCapability(OperaDriverService::OPERA_DRIVER_EXE_PROPERTY, $service->getExecutable());

$this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
w
class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::opera());
    }

    protected function tearDown(): void
    {
        $this->webDriver->quit();
    }

    public function testUserCanLogin()
    {
        $this->webDriver->get('http://localhost/loginStart.php');

        $usernameInput = $this->webDriver->findElement(WebDriverBy::name('username'));
        $passwordInput = $this->webDriver->findElement(WebDriverBy::name('password'));
        $submitButton = $this->webDriver->findElement(WebDriverBy::name('submit'));

        $usernameInput->sendKeys('username');
        $passwordInput->sendKeys('password');
        $submitButton->click();

        $this->assertEquals('http://localhost/paginapersonale.php', $this->webDriver->getCurrentURL());
    }
}