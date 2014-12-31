Feature: If the payment is for a physical product, generate a packing slip for shipping

  Scenario: Physical product
    Given a product named "Macbook pro" and priced 5 was added to the order
    When i process the order
    Then the company should generate the packing slip