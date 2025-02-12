package com.example.helloworld;

import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class ZipCodeRegex {
  private Pattern pattern;

  public ZipCodeRegex(String patternString) {
    this.pattern = Pattern.compile((patternString));
  }

  public String match(String target) {
    String ret = null;
    Matcher matcher = pattern.matcher(target);
    if (matcher.find()) {
      ret = matcher.group();
    }
    return ret;
  }

  public List<String> findAll(String target) {
    Matcher matcher = pattern.matcher(target);
    List<String> lst = new ArrayList<>();
    while (matcher.find()) {
      lst.add(matcher.group());
    }
    return lst;
  }

  public String replace(String target, String repl) {
    Matcher matcher = pattern.matcher(target);
    return matcher.replaceAll(repl);
  }

}
