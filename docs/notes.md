# Project Deployment Notes

## Project Description
"A specialized School Management System designed with Laravel and MySQL. The project is fully containerized using Docker, allowing for a standardized development environment and automated deployment."

## Technical Challenges & Solutions

### 1. Storage & Environment Issues (Local)
* **Challenge:** Faced a 'Disk Full' error on the C: drive during the initial Docker build.
* **Solution:** Migrated the WSL2 backend to the E: drive (1TB capacity), providing sufficient space for Docker images and persistent volumes.

### 2. Cloud Infrastructure Migration (ClawCloud to Google Cloud)
* **Challenge:** Encountered frequent "Connection Dropped" and "Auto-reconnect" issues while using the ClawCloud free tier.
* **Root Cause:** The system's RAM requirements during container initialization exceeded ClawCloud's free tier limits.
* **Solution:** Migrated the entire project deployment to **Google Cloud Console (Cloud Shell)** to ensure a stable and robust production environment.

### 3. Database Connectivity & Integrity
* **Challenge:** Faced 'Table not found' exceptions and 'Unknown column' errors during initial runs.
* **Solution:** Implemented a fresh migration and seeding strategy (`php artisan migrate:fresh --seed`). This ensured that the schema was correct and that the database was populated with the necessary data for Students and Teachers.
