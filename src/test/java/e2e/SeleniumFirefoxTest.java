package e2e;

import static org.assertj.core.api.Assertions.assertThat;

import java.util.List;
import java.util.concurrent.TimeUnit;
import java.util.stream.Collectors;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Tag;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.firefox.FirefoxOptions;



class SeleniumFirefoxTest {

  private WebDriver driver;

  @BeforeEach
  public void connect() {
    // config headless => sans GUI
    FirefoxOptions options = new FirefoxOptions();
    options.setHeadless(true);
    driver = new FirefoxDriver(options);
    // timeout max de chargement de page
    driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
  }

  @AfterEach
  public void close() {
    driver.close();
  }

  // @Test
  @Tag("E2E")
  void testHTPriceForSeleniumDawan() {
    // System.setProperty("webdriver.gecko.driver", "Chemin vers le driver, préférer le PATH");
    this.driver.get("https://dawan.fr");
    // sélection d'un élément DOM comme en javascript
    WebElement searchInput = driver.findElement(By.id("motsclefs"));
    // entrée clavier
    searchInput.sendKeys("selenium");
    // searchInput.sendKeys(Keys.RETURN);
    WebElement submitSearch =
        driver.findElement(By.xpath("//button[@class='pre-menu-search-submit border-form']"));
    submitSearch.click();
    // chercher un Matcher Hamcrest ou...
    List<WebElement> priceContainers = driver.findElements(By.className("result-training-price"));
    List<String> prices =
        priceContainers.stream().map(item -> item.getText()).collect(Collectors.toList());
    for (String p : prices) {
      assertThat(p).contains("1790 €");
    }
  }

}
