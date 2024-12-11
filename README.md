# Laravel Project Installation Guide

## Requirements

Ensure your system meets the following requirements:

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **MySQL**: 5.7 or higher
- **Node.js**: 16 or higher with npm

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/FelipeMogollon1/BEX_Solutions_Technical_Test.git
cd BEX_Solutions_Technical_Test
```

### 2. Install Dependencies

Run the following command to install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

### 3. Set Up Environment Variables

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Edit the `.env` file to configure your database and other environment-specific settings. Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key

Generate the application key for your Laravel project:

```bash
php artisan key:generate
```

### 5. Set Up the Database

Run the migrations to create the database tables:

```bash
php artisan migrate
```

(Optional) Seed the database with sample data:

```bash
php artisan db:seed
```

### 6. Build Frontend Assets

Compile the frontend assets using Vite:

```bash
npm run dev
```

For production builds, use:

```bash
npm run build
```

### 7. Start the Development Server

Run the Laravel development server:

```bash
php artisan serve
```

Access the application at `http://127.0.0.1:8000`.


To clear caches, use:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Deployment

For production, follow these additional steps:

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
2. Optimize the application:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Use a queue worker for queued jobs.

# API Documentation: Visits Endpoint

## Base URL

`http://127.0.0.1:8000/api/v1`

---

## Create a Visit

**Endpoint**: `/visits`  
**Method**: `POST`  
**Description**: Creates a new visit record in the system.

### Request Body

```json
{
    "name": "Joe Doe",
    "email": "Joe.Doe@example.com",
    "latitude": 4.43889,
    "longitude": -75.23222
}
```

true if the visit was created successfully, false otherwise.
```json
{
    "name": "Joe Doe",
    "email": "Joe.Doe@example.com",
    "latitude": 4.43889,
    "longitude": -75.23222,
    "updated_at": "2024-12-11T15:21:36.000000Z",
    "created_at": "2024-12-11T15:21:36.000000Z",
    "id": 14
}
```

## Show a Visits

**Endpoint**: `/visits`  
**Method**: `GET`  
**Description**: Shows a visit record in the system.

### Request Parameters

- `id`: Required, integer.

### Response

```json
{
  "id": 1,
    "name": "Joe Doe",
    "email": "Joe.Doe@example.com",
  "latitude": 4.43889,
  "longitude": -75.23222
}
```

---

## Update a Visit

**Endpoint**: `/visits/{id}`  
**Method**: `PUT`  
**Description**: Updates a visit record in the system.

### Request Parameters

- `id`: Required, integer.  

### Request Body

```json
{
  "name": "Joe Doe",
  "email": "Joe.Doe@example.com",
  "latitude": 4.43889,
  "longitude": -75.23222
}
```

## Delete a Visit

**Endpoint**: `/visits/{id}`  
**Method**: `DELETE`  
**Description**: Deletes a visit record from the system.

### Request Parameters

- `id`: Required, integer.

### Response Body

true if the visit was deleted successfully, false otherwise.
```json
{
    "message": "Visit successfully deleted"
}
```
```json
{
    "error": "Visit not found or could not be deleted"
}
```

### Validation Rules

- `name`: Required, string.
- `email`: Required, valid email.
- `latitude`: Required, number between -90 and 90.
- `longitude`: Required, number between -180 and 180.

---



# Create Visit Command Documentation

## Command Name

```bash
php artisan visits:create
```

## Description
This command allows you to create a new visit record via the API by entering the necessary details interactively.

---

## How to Use

1. Run the command in your terminal:

   ```bash
   php artisan visits:create
   ```

2. Provide the required details when prompted:

    - **Name**: Enter the name of the visitor.
    - **Email**: Provide a valid email address.
    - **Latitude**: Enter the latitude coordinate (a number between -90 and 90).
    - **Longitude**: Enter the longitude coordinate (a number between -180 and 180).

3. The command will validate the inputs and send a POST request to the `http://127.0.0.1:8000/api/v1/visits` endpoint to create the visit.

---

## Example

### Command Execution

```bash
php artisan visits:create
```

### Input Prompts

```
Enter the name of the visit: John Doe
Enter the email of the visit: john.doe@example.com
Enter the latitude of the visit (between -90 and 90): 40.7128
Enter the longitude of the visit (between -180 and 180): -74.0060
```

### Expected Output

- **Success**:
  ```
  Visit created successfully.
  ```
- **Failure**:
  ```
  Invalid email address.
  ```
  or
  ```
  Failed to create visit: {error message from API}
  ```

---

## Validation

The command includes validation for the following:

- **Email**: Must be a valid email address format.
- **Latitude and Longitude**: Must fall within the valid ranges (-90 to 90 for latitude and -180 to 180 for longitude).

---

## API Integration

This command interacts with the `/api/v1/visits` endpoint using a POST request. Make sure the API server is running and accessible at `http://127.0.0.1:8000`.

**Request Payload Example:**

```json
{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "latitude": 40.7128,
  "longitude": -74.0060
}
```

**Response:** The API returns a success message if the visit is created or an error message if the creation fails.

---

## Notes

- Ensure that the `.env` file is properly configured to connect to the API endpoint.
- Check the API endpoint documentation for further details on the `/api/v1/visits` route.

