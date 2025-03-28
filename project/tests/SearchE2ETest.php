<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Facebook\WebDriver\Firefox\FirefoxPreferences;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverPlatform;
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
        $firefoxOptions = new FirefoxPreferences();
        // oblogatoire pour un serveur sous docker, pas de GUI !!!
        $firefoxOptions->addArguments(['-headless']);
        $desiredCapabilities->setCapability(FirefoxOptions::CAPABILITY, $firefoxOptions);
        $this->driver = RemoteWebDriver::create($url, $desiredCapabilities);
    }

    #[Test]
    public function search(): void
    {
        // cnx sur la page de login
        $this->driver->get('https://dawan.fr');
        $this->driver->findElement(WebDriverBy::id('motsclefs'))
             ->sendKeys('selenium');
        $this->driver->findElement(WebDriverBy::id('search-btn'))
             ->click();
        $this->assertStringContainsString(
            '1432',
            $this->driver->findElement(WebDriverBy::xpath('/html/body/section/main/section/div/ol/li[1]/article/div/div[2]/div[3]/p'))->getText()
        );
    }

    protected function tearDown(): void
    {
        // fermer la cnx
        $this->driver->quit();
    }
}
