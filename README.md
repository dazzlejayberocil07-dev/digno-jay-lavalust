# Laboratory Exercise No. 6: Product Management System (Full-Stack CRUD with JWT Auth)

A full-stack Product Management System built for **Laboratory Exercise No. 6**. Featuring a **React.js** frontend communicating via REST API with a **LavaLust PHP API** backend, connected to an **Aiven MySQL** database, designed for deployment on **Render**.

---

## 🌟 Tech Stack

* **Frontend:** React.js (Vite), Axios, Lucide Icons, Custom CSS (Glassmorphism Dark Theme)
* **Backend:** LavaLust PHP Framework / LavaLust REST API Library
* **Database:** Aiven MySQL (Cloud MariaDB / MySQL 8.0)
* **Authentication:** JWT (JSON Web Tokens) with Refresh Tokens
* **Deployment Target:** Render (Web Service Docker/PHP) & Vercel/Netlify for React

---

## 🗄️ Database Schema (`products` Table)

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Supporting Auth Tables:
* `users` — Stores system admin users (`id`, `username`, `email`, `password`, `role`, `is_active`, `created_at`).
* `refresh_tokens` — Stores active JWT refresh tokens (`id`, `user_id`, `token_hash`, `expires_at`, `revoked`, `created_at`).

---

## 🔌 LavaLust API Endpoints

All product CRUD endpoints are protected and require a Bearer token:
`Authorization: Bearer <access_token>`

| Method | Endpoint | Auth Required | Description |
| :--- | :--- | :---: | :--- |
| **POST** | `/api/login` | ❌ | Authenticate user & return JWT tokens |
| **POST** | `/api/logout` | ❌ | Revoke refresh token |
| **POST** | `/api/refresh` | ❌ | Get new access token using refresh token |
| **GET** | `/api/me` | ✅ | Get profile of currently authenticated user |
| **GET** | `/api/products` | ✅ | Fetch all products list |
| **GET** | `/api/products/{id}` | ✅ | Fetch single product by ID |
| **POST** | `/api/products` | ✅ | Add a new product |
| **PUT/PATCH**| `/api/products/{id}` | ✅ | Update an existing product |
| **DELETE** | `/api/products/{id}` | ✅ | Delete a product by ID |

---

## 🚀 Local Development Setup

### 1. Backend (LavaLust PHP API)
1. Clone the repository into your web directory (e.g. `c:/xampp/htdocs/LavaLust`).
2. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
3. Update `.env` with your local database or Aiven MySQL credentials:
   ```ini
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_USER=root
   DB_PASSWORD=
   DB_NAME=mydb
   JWT_SECRET=super_secret_jwt_key_at_least_32_characters_long_123456
   REFRESH_TOKEN_KEY=super_secret_refresh_token_key_at_least_32_chars
   ```
4. Run database migrations:
   ```bash
   php lava migrate
   ```
5. Seed default admin user (`admin` / `admin123`):
   ```bash
   php lava seed
   ```
6. Start local LavaLust development server:
   ```bash
   php lava serve --port=8000
   ```
   *Backend API runs at:* `http://127.0.0.1:8000/api`

---

### 2. Frontend (React.js)
1. Navigate to the frontend directory:
   ```bash
   cd frontend
   ```
2. Install dependencies:
   ```bash
   npm install
   ```
3. Start Vite development server:
   ```bash
   npm run dev
   ```
   *Frontend app runs at:* `http://localhost:5173`

---

## ☁️ Deployment Instructions

### Deploying LavaLust API to Render
1. Push your repository to **GitHub**.
2. Log in to [Render Dashboard](https://dashboard.render.com).
3. Click **New +** → **Web Service**.
4. Connect your GitHub repository.
5. Environment select **Docker** (or use the included `Dockerfile` / `render.yaml`).
6. Add Environment Variables in Render:
   - `DB_HOST`: *(Your Aiven Host)*
   - `DB_PORT`: `26252` *(or your Aiven Port)*
   - `DB_USER`: `avnadmin`
   - `DB_PASSWORD`: *(Your Aiven Password)*
   - `DB_NAME`: `defaultdb`
   - `JWT_SECRET`: *(Min 32 characters)*
   - `REFRESH_TOKEN_KEY`: *(Min 32 characters)*
   - `ALLOW_ORIGIN`: `*`
7. Click **Deploy Web Service**.

---

## 📋 Submission Requirements Checklist

- [x] Database: `products` table created on Aiven MySQL
- [x] Backend: LavaLust API handling GET, POST, PUT, DELETE
- [x] Authentication: JWT token-based auth protecting CRUD operations
- [x] Frontend: React.js application with Login, Product List, Add, Edit, Delete, Logout
- [x] Environment Variables: Database credentials protected in `.env`
- [x] Security: React frontend connects ONLY via LavaLust HTTP API (never directly to MySQL)

---

## 👤 Author & Lab Info
* **Course:** College Laboratory Exercise No. 6
* **Activity:** CRUD with Authentication Using React.js and LavaLust API