Feature: As a user I want to wake an pc over a specific network with its specific mac address

  Scenario: I just want to run the wake command properly
    When I run the command with mac address "f0:79:59:63:f3:5e" and broadcast address "192.168.177.255"
    Then I will get a http 200 back