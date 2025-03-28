<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverPlatform;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SearchE2ETest extends TestCase
{
    protected RemoteWebDriver $driver;

    protected function setUp(): void
    {
        // port 4444 + /wd/hub pour une image (standalone)
        $url = 'http://selenium-server:4444/wd/hub';
        $desiredCapabilities = DesiredCapabilities::chrome();
        $desiredCapabilities->setPlatform(WebDriverPlatform::LINUX);
        $chromeOptions = new ChromeOptions();
        // obligatoire pour un serveur sous docker, pas de GUI !!!
        $chromeOptions->addArguments(['-headless']);
        $desiredCapabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);
        $this->driver = RemoteWebDriver::create($url, $desiredCapabilities);
    }

    #[Test]
    #[CoversNothing]
    public function search(): void
    {
        // cnx sur la page de login
        $this->driver->get('https://www.dawan.fr');

        $this->assertStringContainsString(
            'Dawan',
            $this->driver->getTitle()
        );
        // $input = $this->driver->findElement(WebDriverBy::id('motsclefs'));
        // $input->sendKeys('selenium');
        
        // $btnSearch = $this->driver->findElement(WebDriverBy::id('search-btn'))
        // $btnSearch->click();

        // $results = $this->driver->findElement(WebDriverBy::id('detailcursus-institutionnel'));
        // $ps = $results->findElements(WebDriverBy::tagName('p'));
        

        // $this->assertStringContainsString(
        //     '1432',
        //     $ps[2]->getText()
        // );
    }

    protected function tearDown(): void
    {
        // fermer la cnx
        $this->driver->quit();
    }
}
