package e2e;

import static java.lang.invoke.MethodHandles.lookup;
import static org.assertj.core.api.Assertions.assertThat;
import static org.slf4j.LoggerFactory.getLogger;

import java.net.URL;
import java.util.concurrent.TimeUnit;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Tag;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxOptions;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.slf4j.Logger;

public class SeleniumRemoteTest {
  private WebDriver driver;
  static final Logger log = getLogger(lookup().lookupClass());

  @BeforeEach
  public void connect() {
    FirefoxOptions options = new FirefoxOptions();
    // headless => sans GUI, pas besoin
    options.setHeadless(true);
    try {
      // selenium est le nom/dns/alias réseau du conteneur selenium server
      driver = new RemoteWebDriver(new URL("http://selenium:4444/wd/hub"), options);
      driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
    } catch (Exception e) {
      log.debug(e.getMessage());
      System.exit(1);
    }
  }

  @AfterEach
  public void close() {
    driver.close();
  }

  @Test
  @Tag("E2E")
  public void test() {
    driver.get("https://dawan.fr");
    assertThat(driver.getTitle()).contains("Dawan");
  }
}
