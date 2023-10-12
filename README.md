# GIT SETUP

Thank you for visiting My API, a great resource for all of your data-related needs.

## API Description

This API provides three essential functionalities for managing names:
- **postName**: Insert new entry in the table.
- **printName**: Retrieve the list of names.
- **updatename**: Update an existing name.
- **deleteName**: Cross out one name.

## API Endpoints
## `postName` Endpoint

- **Description:**
  - **The `postName` endpoint allows users to add a new name to the system. It's designed for creating a record of a person's name in the database**

- **Purpose:**
  - **Adding New Names. This endpoint serves the purpose of adding individuals' names to the database. It's particularly useful for applications or systems that need to store and manage lists of names**

- **Key Features:**
  - **Input Validation:** The API typically validates that the input data conforms to specific criteria, such as the name format.
  - **Uniqueness Check:** It may check for the uniqueness of the name to prevent duplicates.
  - **Data Storage:** The API securely stores the name in a database for later retrieval.
  - **Response:** After successfully adding a name, the API typically responds with a confirmation, including the name's unique identifier.

## `printName` Endpoint

- **Description:** The `printName` endpoint is used to retrieve the list of names currently stored in the system.

- **Purpose:**
  - **Listing Names:** Its primary purpose is to provide a list of all the names currently in the database, making it easy to see and retrieve stored names.

- **Key Features:**
  - **No Request Payload:** This endpoint doesn't require a request payload, as it's a read-only operation.
  - **Response:** It responds with an array of name objects, typically including each name's unique identifier and the name itself.

## `updateName` Endpoint

- **Description:** The `updateName` endpoint is used for modifying the existing names in the database.

- **Purpose:**
  - **Updating Names:** It allows users to change or update the names of individuals already in the database. This can be helpful when correcting errors or updating information.

- **Key Features:**
  - **Unique Identifier (ID):** The endpoint typically requires the unique identifier (ID) of the name to be updated, along with the new name.
  - **Validation:** Like the `postName` endpoint, it validates the request to ensure data integrity.
  - **Response:** After successfully updating a name, the API typically responds with a confirmation, including the updated name's details.

## `deleteName` Endpoint

- **Description:** The `deleteName` endpoint is used to remove a name from the list of stored names.

- **Purpose:**
  - **Name Removal:** It serves the purpose of deleting a specific name entry from the database. This can be useful when someone's name needs to be removed or if there was an error in adding a name.

- **Key Features:**
  - **Unique Identifier (ID):** Like the `updateName` endpoint, it requires the unique identifier (ID) of the name to be deleted.
  - **No Request Payload:** It doesn't require a request payload, as it's focused on removal.
  - **Response:** It typically responds with a confirmation that the name has been deleted.

## REQUEST PAYLOAD
-**postName Request Payload**
  - **Description**:
    - **When using the postName endpoint to add a new name, you need to provide a JSON payload that includes the "name" field, which is required**
    - **JSON structure example**
      {
        "fname": "Aron",
        "lname": "Tadina"
      }
- **Required Field**:
     - **fname and lname (string)**
     - **The name you want to add to the database**

## RESPONSE PAYLOAD
-**postName Response Payload**
  - **Description**: 
      - **After successfully adding a name using the postName endpoint, the API typically responds with a confirmation message, including the newly created name's details**
  - **postName Response Payload example**
  {
    "status": "success",
    "data": "null"
  }

## USAGE
- **You can interact with the API using standard HTTP methods**:
  - **To add a name, send a POST request to /postname with the name in the request payload**
  - **To retrieve the list of names, send a GET request to /printname**
  - **To update a name, send a PUT request to /updatename/{id}, where {id} is the ID of the name you want to update**
  - **To delete a name, send a DELETE request to /deletename/{id}, where {id} is the ID of the name you want to delete**

## LICENSE
    None

## Contributors
    Aron Jay Tadina (tadinaaron)

## Contact Information
    Email: tadina.aronjay@gmail.com
    Mobile Number: +639297938784
