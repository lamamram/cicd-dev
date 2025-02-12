package units;

import static org.junit.jupiter.api.Assertions.assertNotNull;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Tag;
import org.junit.jupiter.api.Test;
import com.example.helloworld.ZipCodeRegex;

public class ZipCodeRegexTest {
  ZipCodeRegex zcr;

  // fixture : méthode qui sert le contexte du test pour les méthodes de test
  @BeforeEach
  void instantiateRegex() {
    String zipCodePattern = "[0-9]{5}";
    zcr = new ZipCodeRegex(zipCodePattern);
  }

  // nomenclature de méthode de test commençant par test,
  // méthodes public sans retour car on exécute des assertions
  // décorateur Test (pour dire ici cas de test)
  @Test
  @DisplayName("tester le match d'une cible à partir du début")
  @Tag("Unit")
  public void testMatch() {
    String zipcode = "33500";
    assertNotNull(zcr.match(zipcode));
  }

  // @AfterEach: pour libérer la mémoire
}
