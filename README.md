# sokancoin

This is a payment management system built with Laravel. It allows users to create transactions between wallets and track them efficiently. 

## Features
- **Admin Transaction List Page**
   - The admin can view a list of all transactions.
   - The admin can accept or delete transactions.
   - Transactions include information such as the origin and destination wallet, amount, and status (accepted or pending).
- **Wallets List Page**
   - This page displays a list of all wallets along with basic information about each wallet.
   - The wallet information includes the wallet address, the name of the user who owns the wallet, and the balance.
- **Wallet Details Page**
   - In addition to viewing basic wallet information (such as address and balance), this page also shows the transactions associated with the wallet.
   - It lists all transactions in which the wallet is either the origin or destination wallet.
- **Edit Pending Transaction Amount**
   - Users can edit the amount of transactions that are not yet approved.
   - This functionality is available only for transactions that have not been approved. Once a transaction is approved, the amount cannot be edited.
- **Add New Transaction**
   - Users can create new transactions.
   - The user can select the origin and destination wallets and enter the amount for the transaction. After creating the transaction, its status will be set to "Pending" until it is approved by the admin.

## Installation

Follow these steps to get your Laravel project up and running locally.

### 1. Clone the Repository

First, clone the repository from GitHub.

```bash
git clone https://github.com/mr-fact/sokancoin.git
cd sokancoin
```

### 2. Install Dependencies

Use Composer to install all required PHP dependencies.

```bash
composer install
```

### 3. Set Up Environment File

Copy the `.env.example` file to `.env` to set up your environment configuration.

```bash
cp .env.example .env
```

### 4. Configure Environment Variables

Edit the `.env` file to set your database and other configuration settings, such as the app key, database connection, and mail configuration. Here is a sample of the key configurations:

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:random_generated_key_here
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Generate the Laravel Application Key

Laravel requires an application key for security purposes. Generate this key by running:

```bash
php artisan key:generate
```

### 6. Run Migrations

Run the database migrations to set up the database schema:

```bash
php artisan migrate
```

### 7. Install Frontend Dependencies (Optional)

If your project uses frontend assets like JavaScript or CSS, you need to install Node.js dependencies.

First, install Node.js and NPM if you haven't already.

Then, run:

```bash
npm install
npm run dev
```

This will compile your frontend assets (e.g., using Laravel Mix).

### 8. Start the Development Server

You can now start the Laravel development server:

```bash
php artisan serve
```

This will start the application on `http://localhost:8000`.

### 9. Access the Application

Visit `http://localhost:8000` in your browser to see the Laravel application in action.
