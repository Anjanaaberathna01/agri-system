-- Fix corrupted database tables
USE agri_system;

SET FOREIGN_KEY_CHECKS=0;

-- Drop all tables
DROP TABLE IF EXISTS migrations;
DROP TABLE IF EXISTS tools;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS crops;
DROP TABLE IF EXISTS fertilizers;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS suppliers;
DROP TABLE IF EXISTS product_requests;
DROP TABLE IF EXISTS sessions;
DROP TABLE IF EXISTS cache;
DROP TABLE IF EXISTS cache_locks;
DROP TABLE IF EXISTS jobs;
DROP TABLE IF EXISTS job_batches;
DROP TABLE IF EXISTS failed_jobs;
DROP TABLE IF EXISTS password_reset_tokens;

SET FOREIGN_KEY_CHECKS=1;
