Feature: json_decode filter
  As a api client developer
  In order to simulate simple api behavior
  I need to create response with fake data

  Scenario: Create response from request query parameters
    Given there is a routing file "responses.yml" with following content:
    """
    hello_world:
      request:
        path: /registration
        body: |
          {
            "email": @string@,
            "firstName": @string@,
            "lastName": @string@
          }
      response:
        status: 201
        content: |
          {% set user = request.content|json_decode %}
          {
            "id": 1,
            "email": "{{ user.email }}",
            "firstName": "{{ user.firstName }}",
            "lastName": "{{ user.lastName }}"
          }
    """
    And there is a config file "config.yml" with following content:
    """
    extensions:
      Coduo\TuTu\Extension\Twig: ~
    """
    And TuTu is running on host "localhost" at port "8000"
    When http client send POST request on "http://localhost:8000/registration" with body
    """
    {
      "email": "norbert@coduo.pl",
      "firstName": "Norbert",
      "lastName": "Orzechowicz"
    }
    """
    Then response status code should be 201
    And the response content should match expression:
    """
    {
      "id": 1,
      "email": "norbert@coduo.pl",
      "firstName": "Norbert",
      "lastName": "Orzechowicz"
    }
    """
