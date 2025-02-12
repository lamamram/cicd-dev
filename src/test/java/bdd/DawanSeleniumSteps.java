package bdd;

import static java.lang.invoke.MethodHandles.lookup;
import static org.assertj.core.api.Assertions.assertThat;
import static org.slf4j.LoggerFactory.getLogger;

import java.net.URL;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxOptions;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.slf4j.Logger;

import io.cucumber.java.After;
import io.cucumber.java.Before;
import io.cucumber.java.en.And;
import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import io.cucumber.java.en.When;

public class DawanSeleniumSteps {
  private WebDriver driver;
  private HomePage hp;
  private SearchResultsPage srp;
  static final Logger log = getLogger(lookup().lookupClass());

  // avant chaque scenario
  @Before
  public void connect() {
    FirefoxOptions options = new FirefoxOptions();
    options.setHeadless(true);
    try {
      driver = new RemoteWebDriver(new URL("http://selenium:4444/wd/hub"), options);
      driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
    } catch (Exception e) {
      log.debug(e.getMessage());
      System.exit(1);
    }
  }

  // arpès chaque scénario
  @After
  public void close() {
    driver.close();
  }

  @Given("connexion sur la page d acceuil")
  public void setupScenario1() {
    hp = new HomePage(driver);
  }

  @When("j entre {word} dans le moteur")
  public void act1Scenario1(String kw) {
    hp.searchKeyword(kw);
  }

  @And("j appuie sur le bouton de recherche")
  public void act2Scenario1() {
    hp.goSearch();
  }

  @Then("les prix {int} sont les bons")
  public void assertStep(int price) {
    srp = new SearchResultsPage(driver);
    for (String p : srp.getResultsPrices()) {
      assertThat(p).contains(String.valueOf(price));
    }
  }
}
