package bdd;

import static io.cucumber.junit.platform.engine.Constants.GLUE_PROPERTY_NAME;

import org.junit.platform.suite.api.ConfigurationParameter;
import org.junit.platform.suite.api.IncludeEngines;
import org.junit.platform.suite.api.IncludeTags;
import org.junit.platform.suite.api.SelectClasspathResource;
import org.junit.platform.suite.api.Suite;

@Suite
@IncludeTags({"E2E"})
@IncludeEngines("cucumber")
@SelectClasspathResource("java/bdd")
@ConfigurationParameter(key = GLUE_PROPERTY_NAME, value = "bdd")
public class CucumberTest {

}
