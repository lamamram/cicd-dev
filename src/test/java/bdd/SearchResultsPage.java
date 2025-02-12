package bdd;

import java.util.List;
import java.util.stream.Collectors;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

public class SearchResultsPage {
  private WebDriver driver;
  private By resultPrice = By.className("result-training-price");

  public SearchResultsPage(WebDriver driver) {
    this.driver = driver;
  }

  public List<String> getResultsPrices() {
    return this.driver.findElements(resultPrice).stream().map(item -> item.getText())
        .collect(Collectors.toList());
  }
}
