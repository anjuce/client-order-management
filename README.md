## client-order-management
This is a RESTful API for managing a client order.

### Installation:
Clone the repository: git clone https://github.com/anjuce/client-order-management.git
Navigate to the project directory: cd client-order-management

### Usage
Registration
Use api/register with body
{
"name": "Test User",
"email": "test@example.com",
"password": "password"
}

Authentication
To use the API, you need to authenticate. Send a POST request to /login with your email and password in the request body. You will receive a token which you can use to authenticate subsequent requests.

Example:

{
"email": "user@example.com",
"password": "password"
}

Client:
Endpoints GET /api/clients/{clientId}/orders Retrieve a list of client with orders.

GET /api/client list of clients.

POST /api/clients Create a new client.

Example request body: 
{
"name": "John Doe",
"email": "johdn.doe@example.com",
"phone": "+380991234567"
}

POST /api/client/{id} Update an existing client.

Example request body: 
{
"name": "John Doe",
"email": "johdn.doe@example.com",
"phone": "+380991234567"
}

DELETE /api/client/{id} Delete a client.


Order:
GET /api/orders?status=pending list of orders By filter status.

POST /api/clients/{clientId}/orders Create a new order for client.

Example request body:
{
"status": "pending",
"description":"test",
"amount": "22",
"due_date": "2024-11-30"
}

POST /api/orders/{id} Update an existing order.

Example request body:
{
"status": "completed",
"description":"tests",
"amount": "224",
"due_date": "2024-11-30"
}

DELETE /api/orders/{id} Delete a order.


Contributing Contributions are welcome! Please fork the repository and create a pull request with your changes.

License This project is licensed under the MIT License - see the LICENSE file for details.
