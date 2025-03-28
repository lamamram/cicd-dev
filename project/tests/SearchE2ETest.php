<?php

use Facebook\WebDriver\Firefox\FirefoxOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverPlatform;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SearchE2ETest extends TestCase
{
    protected RemoteWebDriver $driver;

    protected function setUp(): void
    {
        // port 4444 + /wd/hub pour une image (standalone)
        $url = 'http://selenium-server:4444/wd/hub';
        $desiredCapabilities = DesiredCapabilities::firefox();
        $desiredCapabilities->setPlatform(WebDriverPlatform::LINUX);
        $firefoxOptions = new FirefoxOptions();
        // obligatoire pour un serveur sous docker, pas de GUI !!!
        $firefoxOptions->addArguments(['-headless']);
        $desiredCapabilities->setCapability(FirefoxOptions::CAPABILITY, $firefoxOptions);
        $this->driver = RemoteWebDriver::create($url, $desiredCapabilities);
    }

    #[Test]
    #[CoversNothing]
    #[Group("E2E")]
    public function search(): void
    {
        // cnx sur la page de login
        $this->driver->get('https://www.dawan.fr');

        // $this->assertStringContainsString(
        //     'Dawan',
        //     $this->driver->getTitle()
        // );
        $input = $this->driver->findElement(WebDriverBy::id('motsclefs'));
        $input->sendKeys('selenium');
        
        $btnSearch = $this->driver->findElement(WebDriverBy::id('search-btn'));
        $btnSearch->click();

        $results = $this->driver->findElement(WebDriverBy::id('detailcursus-institutionnel'));
        $ps = $results->findElements(WebDriverBy::tagName('p'));

        $this->assertStringContainsString(
            "1432",
            preg_replace("/[^0-9]/", "", $ps[2]->getText())
        );
    }

    protected function tearDown(): void
    {
        // fermer la cnx
        $this->driver->quit();
    }
}
