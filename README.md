# API_Aron

Thank you for visiting My API, a great resource for all of your data-related needs.

## API Description

This API provides three essential functionalities for managing names:

- **postName**: Insert new entry in the table.
- **printName**: Retrieve the list of names.
- **updatename**: Update an existing name.
- **deleteName**: Cross out one name.


## API Endpoints

### `POST /postname`

This endpoint allows you to add a new name to the list. You should provide a JSON payload with the following format:

```json
{
  "fname": "Aron",
  "lname": "Tadina"
}


### `PRINT /printname`

This endpoint retrieves the list of names currently stored in the system.

```json
{
  "fname": "Aron",
  "lname": "Tadina"
}

### `PUT /updatename`

This endpoint allows you to update an existing name by specifying its id in the URL. You should provide a JSON payload with the updated name.

```json
{
  "fname": "Aron",
  "lname": "Tadina"
}


### `DELETE /deletename`
DELETE /deletename/{id}

This endpoint allows you to delete a name from the list by specifying its id in the URL.

```json
{
  "fname": "Aron",
  "lname": "Tadina"
}

//RESPONSE

//POSTNAME
Response
{
    "status": "success",
    "data": "null"
}

//PRINTNAME
Response
{"status":"success","data":[{"fname":"Aron","lname":"Tadia"}]}

//UPDATENAME
{
    "status": "success",
    "data": "null"
}

//DELETENAME
{
    "status": "success",
    "data": "null"
}


## USAGE

You can interact with the API using standard HTTP methods:

To add a name, send a POST request to /postname with the name in the request payload.
To retrieve the list of names, send a GET request to /printname.
To update a name, send a PUT request to /updatename/{id}, where {id} is the ID of the name you want to update.
To delete a name, send a DELETE request to /deletename/{id}, where {id} is the ID of the name you want to delete.

## LICENSE

This API is distributed under the Apache License

## Contributors

Anthony Cabulang (Anthony-0801)
Gene Larenz Garcia (shikun0112)
Aljon Gaspar (aljongaspar)

## Contact Information

For inquiries or support, please contact us at tadina.aronjay@gmail.com
