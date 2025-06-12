# Simple Blog Website (Laravel & Inertia->Vue)

## Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or compatible database

---

## Backend Setup (Laravel)

1. **Clone the repository:**

    ```bash
    git clone <REPO_URL>
    cd <project_folder>
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

3. **Copy and configure environment:**

    ```bash
    cp .env.example .env
    # Edit .env and set your DB credentials
    php artisan key:generate
    ```

4. **Run migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```

5. **Install Laravel Breeze/Jetstream for authentication:**

    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```

6. **Run the backend server:**
    ```bash
    php artisan serve
    ```

---

## Frontend Setup (Vite/Vue )

1. **Install dependencies:**

    ```bash
    npm install
    ```

2. **Run the frontend dev server:**
    ```bash
    npm run dev
    ```
    - The app will be available at `http://localhost:3000` (Laravel's `php artisan serve` port).
    - `npm run dev` does **not** serve the app directly — it only compiles the JavaScript and enables hot module replacement via Vite.
