School Management System (Final Project)
📝 Overview
This is a professional School Management System application developed using the Laravel framework. The system is designed to manage various educational entities including Owners, Students, Teachers, and Guests. It features a comprehensive database structure and is fully containerized using Docker to ensure a seamless setup for developers and production environments.

🛠 Tech Stack
Backend: PHP 8.2 & Laravel 12

Database: MySQL 8.0

Environment: Docker & Docker Compose

Cloud Platform: Google Cloud Console (Cloud Shell)

✨ Key Features
Automated Deployment: Ready-to-run environment using Docker and Docker Compose.

Database Seeding: Pre-populated with sample data for Owners, Teachers, Students, and Classes for immediate testing and evaluation.

Professional Architecture: Clean directory structure following standard Laravel and Docker production patterns.

🚀 Deployment Journey (Assignment 3)
1. Infrastructure Migration: From ClawCloud to Google Cloud
During the deployment phase, I faced a significant technical hurdle that forced a change in the infrastructure provider:

The ClawCloud Challenge: While using the free tier of ClawCloud, the server experienced frequent "Connection Dropped" and "Auto-reconnect" issues.

Root Cause: This was due to high memory (RAM) usage during the Docker build and container initialization process, which exceeded the free tier limits and caused environment instability.

Decision: To ensure system stability and successful deployment, I migrated the entire project to Google Cloud Console (Cloud Shell).

The Result: Google Cloud provided a more robust and stable environment for running Dockerized Laravel and MySQL without interruptions.

2. Challenges & Solutions
The following technical issues were identified and resolved during the deployment:

Database Connection: Initially, the application couldn't connect to MySQL (Connection Refused). I solved this by configuring the .env file with the correct Docker service names (DB_HOST=db).

Empty Tables: After migration, tables were empty. I had to uncomment the seeders and run php artisan migrate:fresh --seed to populate the database with production-ready data.

Missing Column Error: Encountered an Unknown column 'name' error. I fixed this by inspecting the table structure using DESCRIBE users; and updating the queries to match the actual database schema.

💻 How to Run the Project
Run these command:

1. Clone the repository:
git clone https://github.com/AbuAmin222/School-Management-System-laravel-.git

cd School-Management-System-laravel-

2. Setup Environment:
cp .env.example .env

3. Build and Run Containers:
docker compose up -d --build

4. Database Initialization:
docker compose exec app php artisan migrate:fresh --seed
