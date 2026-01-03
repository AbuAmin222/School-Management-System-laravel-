Project Description:

"A specialized School Management System designed with Laravel and MySQL. The project is fully containerized using Docker, allowing for a standardized development environment and automated deployment."

Technical Challenges & Solutions:

Storage Limitation: Faced a 'Disk Full' error on the C: drive during Docker build.

Solution: I migrated the WSL2 backend to the E: drive (1TB capacity), ensuring sufficient space for Docker images and volumes.

Database Connectivity: Resolved 'Table not found' exceptions by implementing a fresh migration and seeding strategy (migrate:fresh --seed) to ensure data integrity for Students and Teachers.
