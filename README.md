query to list all shops: 

query shops {
  shops {
        entity_id
        shop_name
        identifier
        country
  }
}

query get specific Shop by the identifier: 

{
    shop(identifier: "your identifier") {
        entity_id
        shop_name
        identifier
        country
    }
}

mutation to update specific Shop by the identifier:

mutation {
  updateShops(
    input: {
      identifier: "alokka2" 
      shop_name: "ali" 
      country: "Egypt" 
      image: "image"
    }
  ) {
      shop_name
      identifier
      country
      image
    }
  }